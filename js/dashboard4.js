/*
Template Name: Admin Press Admin
Author: Themedesigner
Email: niravjoshi87@gmail.com
File: js
*/
$(function () {
    "use strict";
    // ============================================================== 
    // Product chart
    // ============================================================== 
    Morris.Area({
        element: 'morris-area-chart2',
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
        }],
        xkey: 'date',
        ykeys: ['C1', 'C2','C3', 'D1'],
        labels: ['C1', 'C2','C3', 'D1'],
        pointSize: 0,
        fillOpacity: 0.4,
        pointStrokeColors: ['#1976d2', '#26c6da', '#99abb4', '#ffb22b'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 0,
        smooth: true,
        hideHover: 'auto',
        lineColors: ['#1976d2', '#26c6da', '#99abb4', '#ffb22b' ],
        resize: true
        
    });
   // ============================================================== 
   // Morris donut chart
   // ==============================================================       
    Morris.Donut({
        element: 'morris-donut-chart',
        data: [ {
            label: "Pending",
            value: 3630,
        }, {
            label: "Issued",
            value: 6000
        }],
        resize: true,
        colors:[  '#ef5350','#1976d2']
    });
    // ============================================================== 
    // sales difference
    // ==============================================================
    
    // ============================================================== 
    // sparkline chart
    // ==============================================================
    var sparklineLogin = function() { 
       $('#sparklinedash').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#26c6da'
        });
         $('#sparklinedash2').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#7460ee'
        });
          $('#sparklinedash3').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#03a9f3'
        });
           $('#sparklinedash4').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#f62d51'
        });
       
   }
    var sparkResize;
 
        $(window).resize(function(e) {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparklineLogin, 500);
        });
        sparklineLogin();
});

