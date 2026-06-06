import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';
import ProductList from './components/ProductList';

// Sayfadaki React bileşenlerini (component) yakalayıp render edecek dinamik yapı
const renderReactComponent = (elementId, Component) => {
    const rootElement = document.getElementById(elementId);
    if (rootElement) {
        // İleride Laravel'den (Blade üzerinden) gelecek verileri (props) yakalamak için dataset kullanıyoruz
        const props = Object.assign({}, rootElement.dataset);
        const root = createRoot(rootElement);
        root.render(<Component {...props} />);
    }
};

// Not: Filtreleme ve Sepet bileşenlerimizi oluşturdukça buraya ekleyeceğiz.

// ÇAĞIRMA İŞLEMİ BURADA, EN ALTTA OLMALI:
renderReactComponent('react-product-list', ProductList);