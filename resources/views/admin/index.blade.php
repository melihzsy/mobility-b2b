@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-black text-slate-900">System Overview</h2>
        <p class="text-slate-500 mt-1">Real-time metrics for supply chain and OEM components.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8 animate-[fadeIn_0.3s_ease-out]">
        <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start mb-4">
                <div class="bg-blue-100 text-blue-600 p-3 rounded-xl">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <span class="text-green-500 text-sm font-bold flex items-center gap-1">+12.5% <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" /></svg></span>
            </div>
            <div>
                <div class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-1">Total Volume</div>
                <div class="text-3xl font-black text-slate-900">$124,590.00</div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start mb-4">
                <div class="bg-green-100 text-green-600 p-3 rounded-xl">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                </div>
            </div>
            <div>
                <div class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-1">Active Orders</div>
                <div class="text-3xl font-black text-slate-900">48</div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start mb-4">
                <div class="bg-purple-100 text-purple-600 p-3 rounded-xl">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" /></svg>
                </div>
                <span class="text-green-500 text-sm font-bold flex items-center gap-1">Synced</span>
            </div>
            <div>
                <div class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-1">Active Smart Contracts</div>
                <div class="text-3xl font-black text-slate-900">12</div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start mb-4">
                <div class="bg-orange-100 text-orange-600 p-3 rounded-xl">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" /></svg>
                </div>
            </div>
            <div>
                <div class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-1">Pending Shipments</div>
                <div class="text-3xl font-black text-slate-900">8</div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 bg-white rounded-3xl border border-slate-200 shadow-xl overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-200 bg-slate-50/50 flex justify-between items-center">
                <h3 class="font-black text-lg text-slate-900">Recent Network Transactions</h3>
                <a href="#" class="text-sm font-bold text-blue-600 hover:text-blue-700">View All</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-white border-b border-slate-100 text-slate-400 text-xs uppercase tracking-widest">
                            <th class="px-8 py-4 font-bold">Transaction ID</th>
                            <th class="px-8 py-4 font-bold">Partner</th>
                            <th class="px-8 py-4 font-bold">Amount</th>
                            <th class="px-8 py-4 font-bold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-8 py-5 text-sm font-medium text-slate-500">TX-9842A</td>
                            <td class="px-8 py-5">
                                <div class="font-bold text-slate-900">AutoCorp Europe</div>
                                <div class="text-xs text-slate-500">MOBI VID Registration</div>
                            </td>
                            <td class="px-8 py-5 font-bold text-slate-900">$3,450.00</td>
                            <td class="px-8 py-5"><span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">Verified</span></td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-8 py-5 text-sm font-medium text-slate-500">TX-9841B</td>
                            <td class="px-8 py-5">
                                <div class="font-bold text-slate-900">TechMotion Inc.</div>
                                <div class="text-xs text-slate-500">LiDAR Sensor Batch</div>
                            </td>
                            <td class="px-8 py-5 font-bold text-slate-900">$12,800.00</td>
                            <td class="px-8 py-5"><span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">Processing</span></td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-8 py-5 text-sm font-medium text-slate-500">TX-9840C</td>
                            <td class="px-8 py-5">
                                <div class="font-bold text-slate-900">Global Parts OEM</div>
                                <div class="text-xs text-slate-500">BMS Controller Supply</div>
                            </td>
                            <td class="px-8 py-5 font-bold text-slate-900">$8,900.00</td>
                            <td class="px-8 py-5"><span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">Verified</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-slate-900 rounded-3xl border border-slate-800 shadow-2xl p-8 text-white flex flex-col">
            <h3 class="font-black text-lg mb-6 text-slate-100">System Status</h3>
            
            <div class="space-y-6 flex-1">
                <div class="flex items-start gap-4">
                    <div class="w-3 h-3 rounded-full bg-green-500 mt-1.5 shadow-[0_0_10px_rgba(34,197,94,0.6)]"></div>
                    <div>
                        <div class="font-bold text-slate-200">Main Server</div>
                        <div class="text-sm text-slate-400">Operational • 99.9% Uptime</div>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="w-3 h-3 rounded-full bg-green-500 mt-1.5 shadow-[0_0_10px_rgba(34,197,94,0.6)]"></div>
                    <div>
                        <div class="font-bold text-slate-200">Database Cluster</div>
                        <div class="text-sm text-slate-400">Operational • 12ms ping</div>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="w-3 h-3 rounded-full bg-blue-500 mt-1.5 shadow-[0_0_10px_rgba(59,130,246,0.6)]"></div>
                    <div>
                        <div class="font-bold text-slate-200">Hyperledger Fabric</div>
                        <div class="text-sm text-slate-400">Syncing new blocks...</div>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-slate-800">
                <button class="w-full bg-slate-800 hover:bg-slate-700 text-white font-bold py-3 rounded-xl transition-colors text-sm">
                    Generate Full Report
                </button>
            </div>
        </div>

    </div>
@endsection