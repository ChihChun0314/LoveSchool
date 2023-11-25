<!DOCTYPE html>
<html>
	<h1 style="color:#000000;">事由統計圖</h1>
	<?php
			include 'db.php';
			$count="SELECT a.`semester`,a.`content`,count(a.`account_id`) as `totalpeople` FROM `reservation` as a1 inner join `master_list` as a on a1.`mas_id`=a.`mas_id` INNER JOIN `student_information` AS e ON a.`account_id` = e.`account_id`  where a1.`res_status`='1' and a.`content_number`='0' GROUP BY a.`content`";						
			
			$count11=mysqli_query($link,$count);
			$row_num=0;	
			$totalnum1=0;											
			while($roww=mysqli_fetch_assoc($count11)){
				$select="SELECT a.`semester`,a.`content`,count(DISTINCT a.`account_id`) as `people`,sum(b.`res_hr`) as `totalhr` FROM `master_list` as a inner join `reservation` as b on a.`mas_id`=b.`mas_id` inner join `units` as d on b.`unit_id`=d.`unit_id` where b.`res_status`='1' and a.`content_number`='0' and a.`content`='$roww[content]' GROUP BY a.`content`";	
				$ret=mysqli_query($link,$select);
				
				
				while($row=mysqli_fetch_assoc($ret)){
					$totalnum1+=$row["people"];
					
					$t1="h".$row_num;
					echo "<input type='hidden' id='$t1' value='$row[people]'/>";
					$row_num++;
					
				}
			}
			?>
<div id="container" style="width: 550px; height: 400px; margin: 0 auto"></div>
<script language="JavaScript">

var h1=parseInt(document.getElementById("h0").value);
var h2=parseInt(document.getElementById("h1").value);
var h3=parseInt(document.getElementById("h2").value);
var h4=parseInt(document.getElementById("h3").value);
$(document).ready(function() {  

   var chart = {
       plotBackgroundColor: null,
       plotBorderWidth: null,
       plotShadow: false
   };
   var title = {
      text: ''   
   };      
   var tooltip = {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
   };
   var plotOptions = {
      pie: {
         allowPointSelect: true,
         cursor: 'pointer',
         dataLabels: {
            enabled: true,
            format: '<b>{point.name}%</b>: {point.percentage:.1f} %',
            style: {
               color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
            }
         }
      }
   };
   var series= [{
      type: 'pie',
      name: 'Browser share',
      data: [
         ['改過銷過',   h1],
         ['曠課輔導',   h2],
		 ['服儀違規',   h3],
		 ['留校察看',   h4],
      ]
   }];     
      
   var json = {};   
   json.chart = chart; 
   json.title = title;     
   json.tooltip = tooltip;  
   json.series = series;
   json.plotOptions = plotOptions;
   $('#container').highcharts(json);  
});
</script>
						</section>
					</div>
				</div>
			</div>
	</body>
</html>