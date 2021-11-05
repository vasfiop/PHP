<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../echarts-5.2.2/dist/echarts.js"></script>
</head>

<body>
    <div id="main" style="width: 600px;height: 400px;"></div>
    <script>
        var myChart = echarts.init(document.getElementById("main"));

        var option = {
            title: {
                text: "第一个Echarts示例"
            },
            // tooltip: {},
            // legend: {
            //     data: ['销量']
            // },
            // xAxis: {
            //     data: ["衬衫", "羊毛衫", "雪纺衫", "裤子", "高跟鞋", "袜子"]
            // },
            // yAxis: {},
            // stillShowZeroSum: false,  // 不显示扇形
            // label: {
            //     show: false
            // },  // 不显示标签
            series: [{
                name: '销量',
                type: 'pie',
                // line 折线图
                // bar 柱状图
                // pie 饼图
                // scatter 散点图
                // graph 关系图
                // tree 树图
                radius: '55%', // 百分比缩放
                data: [{
                        value: 5,
                        name: "衬衫"
                    },
                    {
                        value: 20,
                        name: "羊毛衫"
                    },
                    {
                        value: 36,
                        name: "雪纺衫"
                    },
                    {
                        value: 10,
                        name: "裤子"
                    },
                    {
                        value: 10,
                        name: "高跟鞋"
                    },
                    {
                        value: 20,
                        name: "袜子"
                    }
                ]
            }]
        };

        myChart.setOption(option);
    </script>
</body>

</html>