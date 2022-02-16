/*
Template Name: Admin Press Admin
Author: Themedesigner
Email: niravjoshi87@gmail.com
File: js
*/
$(function() {
    "use strict";
    // ============================================================== 
    // Sales overview
    // ============================================================== 
    Morris.Area({
        element: 'earning',
        data: [{
                date: '2018-10-26',
                C1:5000,
                C2:3000,
                C3:4000,
                D1:6000
            }, {
                date: '2018-10-30',
                C1:2000,
                C2:1000,
                C3:2000,
                D1:3000
            }, {
                date: '2018-11-03',
                C1:1000,
                C2:7000,
                C3:6000,
                D1:3000
            }, {
                date: '2018-11-06',
                C1:10000,
                C2:2000,
                C3:5000,
                D1:9000
            }, {
                date: '2018-11-09',
                C1:7000,
                C2:3000,
                C3:6000,
                D1:2000
            }, {
                date: '2018-11-12',
                C1:12000,
                C2:9000,
                C3:7000,
                D1:8000
            },
            {
                date: '2018-11-15',
                C1:6000,
                C2:5000,
                C3:8000,
                D1:6000
            }
        ],
        xkey: 'date',
        ykeys: ['C1', 'C2','C3', 'D1'],
        labels: ['C1', 'C2','C3', 'D1'],
        xLabels: 'day',
        ymax: '13000',
        pointSize: 3,
        fillOpacity: 0,
        pointStrokeColors: ['#1976d2', '#26c6da', '#99abb4', '#ffb22b'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 3,
        hideHover: 'auto',
        lineColors: ['#1976d2', '#26c6da', '#99abb4', '#ffb22b' ],
        resize: true

    });

    // ============================================================== 
    // Sales overview
    // ==============================================================
    // ============================================================== 
    // Download count
    // ============================================================== 
    var sparklineLogin = function() {
        $('.spark-count').sparkline([4, 5, 0, 10, 9, 12, 4, 9, 4, 5, 3, 10, 9, 12, 10, 9], {
            type: 'bar',
            width: '100%',
            height: '70',
            barWidth: '2',
            resize: true,
            barSpacing: '6',
            barColor: 'rgba(255, 255, 255, 0.3)'
        });

        $('.spark-count2').sparkline([20, 40, 30], {
            type: 'pie',
            height: '90',
            resize: true,
            sliceColors: ['#1cadbf', '#1f5f67', '#ffffff']
        });
    }
    var sparkResize;

    sparklineLogin();


});