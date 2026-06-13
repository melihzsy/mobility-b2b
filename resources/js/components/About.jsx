import React from 'react';

export default function About() {
  return (
    <div className="min-h-screen bg-slate-50 py-16 px-8">
      <div className="max-w-4xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden">
        <div className="p-12">
          <h1 className="text-4xl font-black text-slate-900 mb-6">About Mobility.B2B</h1>
          <p className="text-lg text-slate-600 leading-relaxed mb-8">
            Mobility.B2B is an advanced OEM components and supply chain platform designed for the next generation of automotive mobility systems. This project bridges the gap between physical hardware tracking and modern software architectures.
          </p>

          <h2 className="text-2xl font-bold text-slate-800 mb-4">The Vision & Developer</h2>
          <p className="text-slate-600 leading-relaxed mb-8">
            Developed by a passionate Software Engineering student, this platform explores the intersection of smart technologies, scalable enterprise architectures, and distributed mobility frameworks. The goal is to provide a robust, full-stack solution for managing complex automotive hardware catalogs seamlessly while preparing for broader integrations.
          </p>

          <div className="bg-blue-50 rounded-2xl p-8 border border-blue-100">
            <h2 className="text-2xl font-bold text-blue-900 mb-4">Project Details & Contact</h2>
            <div className="space-y-4 text-blue-800">
              <p><strong>Module:</strong> Advanced Web Programming Final Project</p>
              <p><strong>Tech Stack:</strong> Laravel, React, Tailwind CSS</p>
              <p><strong>System Status:</strong> v1.0 Active (Development Phase)</p>
              <p><strong>Corporate Inquiries:</strong> admin@mysite.com</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}