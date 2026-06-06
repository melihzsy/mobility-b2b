import React from 'react';

const ProductModal = ({ product, onClose, onAddToCart }) => {
    // Eğer dışarıdan bir ürün (product) seçilmemişse, bileşeni hiç render etme
    if (!product) return null;

    return (
        <div className="fixed inset-0 z-[60] flex items-center justify-center p-4 sm:p-6">
            {/* Arka plan karartması - Tıklanınca Modalı kapatır */}
            <div className="absolute inset-0 bg-slate-900/80 backdrop-blur-sm" onClick={onClose}></div>
            
            <div className="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto relative z-10 flex flex-col md:flex-row animate-[fadeIn_0.2s_ease-out]">
                {/* Çarpı (Kapat) Butonu */}
                <button onClick={onClose} className="absolute top-4 right-4 z-20 bg-white/50 backdrop-blur-md hover:bg-slate-100 p-2 rounded-full text-slate-600 transition-colors">
                    <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
                
                {/* Sol Taraf - Büyük Görsel */}
                <div className="w-full md:w-1/2 bg-slate-100 p-8 flex items-center justify-center">
                    <img src={product.image} alt={product.name} className="max-w-full h-auto rounded-xl shadow-lg" />
                </div>
                
                {/* Sağ Taraf - Detaylar ve Butonlar */}
                <div className="w-full md:w-1/2 p-8 flex flex-col justify-between">
                    <div>
                        <div className="inline-block bg-blue-100 text-blue-700 font-bold px-3 py-1 rounded-full text-xs tracking-wider uppercase mb-4">
                            {product.category}
                        </div>
                        <h2 className="text-3xl font-black text-slate-900 mb-2">{product.name}</h2>
                        
                        {/* Yıldızlar ve İncelemeler */}
                        <div className="flex items-center gap-2 mb-6">
                            <div className="flex text-yellow-400">
                                {[1,2,3,4,5].map(star => <svg key={star} className="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>)}
                            </div>
                            <span className="text-sm text-slate-500 font-medium">182 Reviews</span>
                        </div>
                        
                        <p className="text-slate-600 leading-relaxed mb-6 mt-4">
                            {product.description}
                        </p>
                    </div>
                    
                    <div>
                        <div className="text-4xl font-black text-slate-900 mb-6">${product.price.toFixed(2)}</div>
                        <div className="flex gap-4">
                            <button onClick={() => onAddToCart(product)} className="flex-1 border-2 border-blue-600 text-blue-600 hover:bg-blue-50 font-bold py-3 rounded-xl transition-colors">
                                Sepete Ekle
                            </button>
                            <button onClick={() => onAddToCart(product)} className="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-lg shadow-blue-500/30 transition-colors">
                                Şimdi Al
                            </button>
                        </div>
                        <div className="mt-4 flex items-center text-sm text-green-600 font-medium">
                            <svg className="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M5 13l4 4L19 7" /></svg>
                            Hızlı Teslimat: 2 gün içinde kargoda
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default ProductModal;