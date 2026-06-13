import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';
import ProductList from './components/ProductList';
// 1. Yeni bileşenimizi içe aktarıyoruz
// (Dosyayı Pages klasörüne koyduysan yolu './Pages/About' olarak değiştir)
import About from './components/About'; 

const renderReactComponent = (elementId, Component) => {
    const rootElement = document.getElementById(elementId);
    if (rootElement) {
        const props = Object.assign({}, rootElement.dataset);
        const root = createRoot(rootElement);
        root.render(<Component {...props} />);
    }
};

// ÇAĞIRMA İŞLEMLERİ BURADA:
renderReactComponent('react-product-list', ProductList);
// 2. About sayfamız için yeni bir dinleyici ekliyoruz
renderReactComponent('react-about-page', About);