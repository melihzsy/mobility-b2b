import React, { useState } from 'react';

const Checkout = ({ cart, cartTotal, onBackToCatalog, onClearCart }) => {
    // Siparişin başarıyla tamamlanıp tamamlanmadığını tutan yerel State
    const [orderSuccess, setOrderSuccess] = useState(false);

    // Siparişi tamamlama fonksiyonu
    const handlePlaceOrder = (e) => {
        e.preventDefault(); // Formun sayfayı yenilemesini engeller
        setOrderSuccess(true);
        onClearCart(); // Sipariş verilince sepeti ana bileşenden (Storefront) temizle
    };

    // ==========================================
    // BAŞARILI SİPARİŞ EKRANI (SUCCESS STATE)
    // ==========================================
    if (orderSuccess) {
        return (
            <div className="max-w-2xl mx-auto py-20 px-4 text-center animate-[fadeIn_0.5s_ease-out]">
                <div className="bg-green-100 text-green-600 h-24 w-24 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg shadow-green-500/30">
                    <svg className="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={3} d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h2 className="text-4xl font-black text-slate-900 mb-4">Payment Successful!</h2>
                <p className="text-slate-600 text-lg mb-8">
                    Your mobility hardware order <strong>#ORD-{Math.floor(Math.random() * 90000) + 10000}</strong> has been placed securely. We have sent the invoice and tracking details to your email.
                </p>
                <button 
                    onClick={onBackToCatalog}
                    className="bg-slate-900 hover:bg-blue-600 text-white font-bold py-3 px-8 rounded-xl transition-colors shadow-xl"
                >
                    &larr; Return to Catalog
                </button>
            </div>
        );
    }

    // ==========================================
    // ÖDEME FORMU VE SEPET ÖZETİ EKRANI
    // ==========================================
    return (
        <div className="max-w-6xl mx-auto animate-[fadeIn_0.3s_ease-out]">
            <button onClick={onBackToCatalog} className="text-slate-500 hover:text-blue-600 font-bold mb-6 flex items-center gap-2 transition-colors">
                <svg className="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Back to Catalog
            </button>
            
            <div className="flex flex-col lg:flex-row gap-10">
                {/* Sol Taraf: Formlar */}
                <div className="w-full lg:w-2/3">
                    <h2 className="text-3xl font-black text-slate-900 mb-8">Secure Checkout</h2>
                    <form onSubmit={handlePlaceOrder}>
                        {/* Teslimat Bilgileri */}
                        <div className="bg-white border border-slate-200 p-6 rounded-2xl shadow-sm mb-6">
                            <h3 className="text-lg font-bold text-slate-800 mb-4 border-b border-slate-100 pb-2">Shipping Information</h3>
                            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label className="block text-sm font-bold text-slate-600 mb-1">Company / Full Name</label>
                                    <input required type="text" className="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Acme Mobility Corp." />
                                </div>
                                <div>
                                    <label className="block text-sm font-bold text-slate-600 mb-1">Email Address</label>
                                    <input required type="email" className="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="billing@acme.com" />
                                </div>
                                <div className="md:col-span-2">
                                    <label className="block text-sm font-bold text-slate-600 mb-1">Shipping Address</label>
                                    <input required type="text" className="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="123 Innovation Drive, Tech Park" />
                                </div>
                            </div>
                        </div>

                        {/* Kredi Kartı Bilgileri */}
                        <div className="bg-slate-900 p-6 rounded-2xl shadow-lg mb-6 text-white relative overflow-hidden">
                            <div className="absolute top-0 right-0 p-4 opacity-10">
                                <svg className="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/></svg>
                            </div>
                            <h3 className="text-lg font-bold text-white mb-4 border-b border-slate-700 pb-2 relative z-10">Payment Details</h3>
                            <div className="grid grid-cols-1 md:grid-cols-2 gap-4 relative z-10">
                                <div className="md:col-span-2">
                                    <label className="block text-sm font-bold text-slate-400 mb-1">Card Number</label>
                                    <input required type="text" maxLength="19" className="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white placeholder-slate-500 focus:ring-2 focus:ring-blue-500 focus:outline-none tracking-widest" placeholder="0000 0000 0000 0000" />
                                </div>
                                <div>
                                    <label className="block text-sm font-bold text-slate-400 mb-1">Expiry Date</label>
                                    <input required type="text" maxLength="5" className="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white placeholder-slate-500 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="MM/YY" />
                                </div>
                                <div>
                                    <label className="block text-sm font-bold text-slate-400 mb-1">CVC</label>
                                    <input required type="password" maxLength="3" className="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white placeholder-slate-500 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="***" />
                                </div>
                            </div>
                        </div>

                        <button type="submit" className="w-full bg-blue-600 hover:bg-blue-700 text-white font-black text-lg py-4 rounded-xl shadow-xl shadow-blue-500/30 transition-transform hover:-translate-y-1">
                            Pay ${(cartTotal + 45).toFixed(2)} Now
                        </button>
                    </form>
                </div>

                {/* Sağ Taraf: Sipariş Özeti */}
                <div className="w-full lg:w-1/3">
                    <div className="bg-slate-50 border border-slate-200 p-6 rounded-2xl sticky top-6 shadow-sm">
                        <h3 className="text-xl font-black text-slate-900 mb-6">Order Summary</h3>
                        <div className="space-y-4 mb-6 max-h-80 overflow-y-auto pr-2">
                            {cart.map(item => (
                                <div key={item.id} className="flex gap-4">
                                    <img src={item.image} alt={item.name} className="w-16 h-16 object-cover rounded-lg border border-slate-200" />
                                    <div className="flex-1">
                                        <h4 className="text-sm font-bold text-slate-800 line-clamp-1">{item.name}</h4>
                                        <div className="text-xs text-slate-500 mb-1">Qty: {item.quantity}</div>
                                        <div className="text-sm font-black text-blue-600">${(item.price * item.quantity).toFixed(2)}</div>
                                    </div>
                                </div>
                            ))}
                        </div>
                        
                        <div className="border-t border-slate-200 pt-4 space-y-3">
                            <div className="flex justify-between text-slate-600">
                                <span>Subtotal</span>
                                <span className="font-bold">${cartTotal.toFixed(2)}</span>
                            </div>
                            <div className="flex justify-between text-slate-600">
                                <span>Shipping (Express)</span>
                                <span className="font-bold">$45.00</span>
                            </div>
                            <div className="flex justify-between text-xl font-black text-slate-900 border-t border-slate-200 pt-3 mt-3">
                                <span>Total</span>
                                <span>${(cartTotal + 45).toFixed(2)}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Checkout;