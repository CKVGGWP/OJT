function birthCount() {
  $.ajax({
    url: "controller/ck_dataController.php",
    type: "GET",
    data: { getData: 1 },
    dataType: "json",
    success: function (data) {
      let month = [],
        total = [];

      for (let i = 0; i < data.length; i++) {
        month.push(data[i].birthdate);
        total.push(data[i].count);
      }

      let chartData = {
        category: month,
        total: total,
      };

      return chartData;
    },
  });
}

am4core.ready(function () {
  let chart = am4core.createFromConfig(
    {
      type: "PieChart",
      data: [birthCount()],
      series: [
        {
          type: "PieSeries",
          dataFields: {
            value: "value",
            category: "category",
          },
        },
      ],
      radius: "60%",
    },
    document.getElementById("chartdiv")
  );
});
