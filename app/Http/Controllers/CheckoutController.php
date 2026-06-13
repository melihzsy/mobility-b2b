<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Iyzipay\Options;
use Iyzipay\Model\PaymentCard;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\Address;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\Payment;
use Iyzipay\Request\CreatePaymentRequest;

class CheckoutController extends Controller
{
    // 1. Çok adımlı ödeme sayfasını gösteren fonksiyon
    public function index()
    {
        return view('checkout'); 
    }

    // 2. İyzico'ya ödeme isteğini gönderen fonksiyon
    public function process(Request $request)
    {
        // Gelen kart bilgilerini doğrula
        $request->validate([
            'card_name' => 'required|string',
            'card_number' => 'required',
            'expire_month' => 'required|numeric',
            'expire_year' => 'required|numeric',
            'cvc' => 'required|numeric',
        ]);

        // İyzico API Ayarları (.env dosyasından çekiyoruz)
        $options = new Options();
        $options->setApiKey(env('IYZIPAY_API_KEY'));
        $options->setSecretKey(env('IYZIPAY_SECRET_KEY'));
        $options->setBaseUrl(env('IYZIPAY_BASE_URL'));

        // Ödeme İsteği Oluşturma
        $paymentRequest = new CreatePaymentRequest();
        $paymentRequest->setLocale(\Iyzipay\Model\Locale::TR);
        $paymentRequest->setConversationId("TX-MOBI-" . time());
        $paymentRequest->setPrice("1450.0"); // Toplam Tutar
        $paymentRequest->setPaidPrice("1450.0"); // Tahsil Edilecek Tutar
        $paymentRequest->setCurrency(\Iyzipay\Model\Currency::USD); // Global çalıştığımız için USD
        $paymentRequest->setInstallment(1); // Tek çekim
        $paymentRequest->setBasketId("B2B-ORD-" . time());
        $paymentRequest->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
        $paymentRequest->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);

        // Kredi Kartı Bilgileri (Formdan gelen veriler)
        $paymentCard = new PaymentCard();
        $paymentCard->setCardHolderName($request->card_name);
        $paymentCard->setCardNumber(str_replace(' ', '', $request->card_number)); // Boşlukları temizle
        $paymentCard->setExpireMonth($request->expire_month);
        $paymentCard->setExpireYear($request->expire_year);
        $paymentCard->setCvc($request->cvc);
        $paymentCard->setRegisterCard(0);
        $paymentRequest->setPaymentCard($paymentCard);

        // Alıcı (Kurumsal B2B Müşterisi Simülasyonu)
        $buyer = new Buyer();
        $buyer->setId("BY789");
        $buyer->setName("AutoCorp");
        $buyer->setSurname("Europe");
        $buyer->setGsmNumber("+905324000000");
        $buyer->setEmail("procurement@autocorp.eu");
        $buyer->setIdentityNumber("11111111111");
        $buyer->setRegistrationAddress("Innovation District, Mobility Tech Park");
        $buyer->setIp($request->ip());
        $buyer->setCity("Istanbul");
        $buyer->setCountry("Turkey");
        $paymentRequest->setBuyer($buyer);

        // Fatura ve Teslimat Adresi
        $address = new Address();
        $address->setContactName("AutoCorp Logistics");
        $address->setCity("Istanbul");
        $address->setCountry("Turkey");
        $address->setAddress("Innovation District, Mobility Tech Park, Block 4");
        $paymentRequest->setShippingAddress($address);
        $paymentRequest->setBillingAddress($address);

        // Sepet İçeriği (Donanım Kataloğu Ürünü)
        $basketItems = array();
        $firstBasketItem = new BasketItem();
        $firstBasketItem->setId("COMP-1024");
        $firstBasketItem->setName("Solid-State LiDAR Sensor V2");
        $firstBasketItem->setCategory1("Autonomous Systems");
        $firstBasketItem->setCategory2("Sensors");
        $firstBasketItem->setItemType(BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice("1450.0");
        $basketItems[0] = $firstBasketItem;

        $paymentRequest->setBasketItems($basketItems);

        // İşlemi İyzico'ya Gönder
        $payment = Payment::create($paymentRequest, $options);

        // Sonucu Kontrol Et
        if ($payment->getStatus() == 'success') {
            // BAŞARILI: İleride buraya Veritabanına "Order" kaydetme ve Mailable (Email) kodlarını ekleyeceğiz!
            return redirect()->route('checkout.success')->with('success', 'Transaction Approved. ID: ' . $payment->getPaymentId());
        } else {
            // BAŞARISIZ: Hata mesajıyla form sayfasına dön
            return back()->withErrors(['error' => 'Payment Failed: ' . $payment->getErrorMessage()]);
        }
    }

    // 3. Başarılı ödeme sonrası gösterilecek sayfa
    public function success()
    {
        return view('checkout-success');
    }
}