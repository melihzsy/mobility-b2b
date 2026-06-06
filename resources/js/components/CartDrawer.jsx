import React from 'react';

const CartDrawer = ({ 
    isCartOpen, 
    onClose, 
    cart, 
    updateQuantity, 
    removeFromCart, 
    cartTotal, 
    onProceedToCheckout 
}) => {
    return (
        <>
            {/* Arka Plan Karartması (Overlay) - Tıklanınca Sepeti Kapatır */}
            {isCartOpen && (
                <div 
                    className="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 transition-opacity"
                    onClick={onClose}
                ></div>
            )}

            {/* SAĞDAN AÇILAN SEPET ÇEKMECESİ (Slide-out Drawer) */}
            <div className={`fixed top-0 right-0 h-full w-full md:w-[450px] bg-slate-900 z-50 shadow-2xl flex flex-col transform transition-transform duration-300 ease-in-out ${isCartOpen ? 'translate-x-0' : 'translate-x-full'}`}>
                
                {/* Çekmece Başlığı */}
                <div className="px-6 py-5 border-b border-slate-800 flex justify-between items-center bg-slate-900/95 sticky top-0">
                    <div className="flex items-center gap-3">
                        <div className="bg-blue-600/20 p-2 rounded-lg text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <h2 className="text-xl font-bold text-white tracking-wide">Your Cart</h2>
                    </div>
                    <button onClick={onClose} className="text-slate-400 hover:text-white transition-colors p-1 bg-slate-800 rounded-full hover:bg-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {/* Sepet İçeriği (Kaydırılabilir Alan) */}
                <div className="flex-1 overflow-y-auto p-6 space-y-4">
                    {cart.length === 0 ? (
                        <div className="text-center py-20 flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" className="h-16 w-16 text-slate-700 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1} d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <p className="text-slate-400 font-medium">Your cart is currently empty.</p>
                            <button onClick={onClose} className="mt-4 text-blue-500 hover:text-blue-400 text-sm font-bold">Continue Shopping &rarr;</button>
                        </div>
                    ) : (
                        cart.map((item) => (
                            <div key={item.id} className="bg-slate-800 rounded-xl p-4 flex gap-4 border border-slate-700/50 relative group">
                                <img src={item.image} alt={item.name} className="h-16 w-16 object-cover rounded-lg" />
                                <div className="flex-1 flex flex-col justify-between">
                                    <div className="pr-6">
                                        <h4 className="text-white font-bold text-sm leading-tight mb-1">{item.name}</h4>
                                        <div className="text-blue-400 font-black text-sm">${item.price.toFixed(2)}</div>
                                    </div>
                                    <div className="flex items-center gap-3 mt-2">
                                        <div className="flex items-center bg-slate-900 rounded-lg border border-slate-700">
                                            <button onClick={() => updateQuantity(item.id, -1)} className="px-2 py-1 text-slate-400 hover:text-white hover:bg-slate-700 rounded-l-lg transition-colors">-</button>
                                            <span className="px-2 text-xs font-bold text-white min-w-[24px] text-center">{item.quantity}</span>
                                            <button onClick={() => updateQuantity(item.id, 1)} className="px-2 py-1 text-slate-400 hover:text-white hover:bg-slate-700 rounded-r-lg transition-colors">+</button>
                                        </div>
                                        <div className="text-xs text-slate-500 font-medium">Sub: ${(item.price * item.quantity).toFixed(2)}</div>
                                    </div>
                                </div>
                                <button 
                                    onClick={() => removeFromCart(item.id)}
                                    className="absolute top-4 right-4 text-slate-500 hover:text-red-500 transition-colors p-1"
                                    title="Remove item"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        ))
                    )}
                </div>

                {/* Çekmece Alt Kısmı (Checkout Butonu) */}
                {cart.length > 0 && (
                    <div className="p-6 border-t border-slate-800 bg-slate-900/95">
                        <div className="flex justify-between items-center mb-4">
                            <span className="text-slate-400 font-medium">Subtotal</span>
                            <span className="text-2xl font-black text-white">${cartTotal.toFixed(2)}</span>
                        </div>
                        <button 
                            onClick={onProceedToCheckout} 
                            className="w-full bg-blue-600 hover:bg-blue-500 text-white py-4 rounded-xl font-bold transition-all shadow-[0_0_15px_rgba(37,99,235,0.4)] flex justify-center items-center gap-2"
                        >
                            Secure Checkout
                            <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fillRule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clipRule="evenodd" />
                            </svg>
                        </button>
                    </div>
                )}
            </div>
        </>
    );
};

export default CartDrawer;