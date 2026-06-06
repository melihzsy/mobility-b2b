import React, { useState, useEffect } from 'react';
// Oluşturduğumuz modülleri (bileşenleri) içeri aktarıyoruz
import Checkout from './Checkout';
import ProductModal from './ProductModal';
import CartDrawer from './CartDrawer';

const ProductList = () => {
    // 1. STATE YÖNETİMİ (Verilerin Tutulduğu Yer)
    const [products, setProducts] = useState([]);
    const [loading, setLoading] = useState(true);
    const [cart, setCart] = useState([]);
    
    // UI (Görünüm) Kontrolcüleri
    const [isCartOpen, setIsCartOpen] = useState(false);
    const [selectedProduct, setSelectedProduct] = useState(null);
    const [isCheckout, setIsCheckout] = useState(false);

    // 2. VERİ ÇEKME (API Simülasyonu)
    useEffect(() => {
        const dummyProducts = [
            { id: 1, name: "Solid-State LiDAR Sensor V2", price: 1450.00, category: "Autonomous Systems", image: "https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=800&q=80", description: "Next-generation solid-state LiDAR with 250m range and high-resolution point cloud generation." },
            { id: 2, name: "MOBI VID Blockchain Node", price: 450.00, category: "Vehicle Identity", image: "https://images.unsplash.com/photo-1639322537228-f710d846310a?auto=format&fit=crop&w=800&q=80", description: "Hardware security module storing the Vehicle Identity (VID) securely on the decentralized ledger." },
            { id: 3, name: "High-Voltage BMS Controller", price: 890.00, category: "EV Powertrain", image: "https://images.unsplash.com/photo-1593941707882-a5bba14938c7?auto=format&fit=crop&w=800&q=80", description: "Advanced Battery Management System for 800V architecture EV platforms." },
            { id: 4, name: "V2X Telematics 5G Module", price: 320.50, category: "Connected Vehicles", image: "https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=800&q=80", description: "5G enabled Vehicle-to-Everything (V2X) communication module." },
            { id: 5, name: "Autonomous Drive Compute Unit", price: 2100.00, category: "Autonomous Systems", image: "https://images.unsplash.com/photo-1555664424-778a1e5e1b48?auto=format&fit=crop&w=800&q=80", description: "High-performance AI compute node for real-time sensor fusion and path planning." },
            { id: 6, name: "Predictive Maintenance IoT Hub", price: 275.00, category: "Vehicle Identity", image: "https://images.unsplash.com/photo-1563770660941-20978e870e26?auto=format&fit=crop&w=800&q=80", description: "Collects real-time diagnostic data and utilizes machine learning edge algorithms." },
            { id: 7, name: "Regenerative Braking Sensor", price: 115.75, category: "EV Powertrain", image: "https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&w=800&q=80", description: "High-precision hall-effect sensor for detecting brake pedal pressure." },
            { id: 8, name: "Smart Fleet Gateway Pro", price: 550.00, category: "Connected Vehicles", image: "https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=800&q=80", description: "Enterprise-grade fleet management router providing secure VPN tunnels." }
        ];
        
        setTimeout(() => {
            setProducts(dummyProducts);
            setLoading(false);
        }, 800);
    }, []);

    // 3. İŞ MANTIĞI (Business Logic)
    const addToCart = (product) => {
        const existingItem = cart.find(item => item.id === product.id);
        if (existingItem) {
            setCart(cart.map(item => item.id === product.id ? { ...item, quantity: item.quantity + 1 } : item));
        } else {
            setCart([...cart, { ...product, quantity: 1 }]);
        }
        setIsCartOpen(true);
        setSelectedProduct(null);
    };

    const removeFromCart = (productId) => setCart(cart.filter(item => item.id !== productId));
    
    const updateQuantity = (productId, delta) => {
        setCart(cart.map(item => {
            if (item.id === productId) {
                const newQuantity = item.quantity + delta;
                return newQuantity > 0 ? { ...item, quantity: newQuantity } : item;
            }
            return item;
        }));
    };

    const cartTotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
    const cartItemCount = cart.reduce((total, item) => total + item.quantity, 0);

    // 4. RENDER (Ekrana Basma)
    if (loading) {
        return (
            <div className="flex flex-col items-center justify-center py-24 text-slate-400">
                <svg className="animate-spin h-10 w-10 text-blue-600 mb-4" fill="none" viewBox="0 0 24 24">
                    <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4"></circle>
                    <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <div className="font-medium tracking-wider animate-pulse uppercase">Loading Parts...</div>
            </div>
        );
    }

    // Eğer ödeme ekranındaysak, Checkout modülünü çağır (Props ile verileri gönder)
    if (isCheckout) {
        return (
            <Checkout 
                cart={cart}
                cartTotal={cartTotal}
                onBackToCatalog={() => setIsCheckout(false)}
                onClearCart={() => setCart([])}
            />
        );
    }

    // Ana Sayfa Vitrini
    return (
        <div className="relative">
            {/* Yüzen Sepet Butonu */}
            <button onClick={() => setIsCartOpen(true)} className="fixed bottom-8 right-8 z-40 bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-full shadow-[0_10px_25px_rgba(37,99,235,0.5)] transition-transform hover:scale-105">
                <svg className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                {cartItemCount > 0 && <span className="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold h-6 w-6 rounded-full flex items-center justify-center border-2 border-white">{cartItemCount}</span>}
            </button>

            {/* SEPET ÇEKMECESİ MODÜLÜNÜ ÇAĞIR */}
            <CartDrawer 
                isCartOpen={isCartOpen}
                onClose={() => setIsCartOpen(false)}
                cart={cart}
                updateQuantity={updateQuantity}
                removeFromCart={removeFromCart}
                cartTotal={cartTotal}
                onProceedToCheckout={() => {
                    setIsCartOpen(false);
                    setIsCheckout(true);
                }}
            />

            {/* ÜRÜN DETAY (MODAL) MODÜLÜNÜ ÇAĞIR */}
            <ProductModal 
                product={selectedProduct}
                onClose={() => setSelectedProduct(null)}
                onAddToCart={addToCart}
            />

            {/* ÜRÜN LİSTESİ */}
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                {products.map(product => (
                    <div key={product.id} className="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col group overflow-hidden">
                        <div onClick={() => setSelectedProduct(product)} className="h-48 bg-slate-100 overflow-hidden cursor-pointer relative">
                            <img src={product.image} alt={product.name} className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            <div className="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors flex items-center justify-center">
                                <span className="opacity-0 group-hover:opacity-100 bg-white/90 text-slate-800 text-sm font-bold py-2 px-4 rounded-full transform translate-y-4 group-hover:translate-y-0 transition-all shadow-sm">Quick View</span>
                            </div>
                        </div>
                        <div className="p-5 flex-1 flex flex-col justify-between">
                            <div>
                                <div className="text-[10px] text-blue-600 font-bold mb-1.5 uppercase tracking-widest">{product.category}</div>
                                <h3 onClick={() => setSelectedProduct(product)} className="text-base font-bold text-slate-800 mb-2 leading-tight line-clamp-2 cursor-pointer hover:text-blue-600 transition-colors">{product.name}</h3>
                            </div>
                            <div className="flex justify-between items-center mt-4 pt-4 border-t border-slate-100">
                                <span className="text-xl font-black text-slate-900">${product.price.toFixed(2)}</span>
                                <button onClick={() => addToCart(product)} className="bg-slate-100 hover:bg-slate-900 text-slate-800 hover:text-white px-4 py-2 rounded-lg text-sm font-bold transition-colors">+ Add</button>
                            </div>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    );
};

export default ProductList;