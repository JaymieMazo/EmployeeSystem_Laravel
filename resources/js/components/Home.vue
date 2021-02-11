<template>
    <v-card>
      
        <v-row  clas="px-2" >
        
            <v-col cols=5   class="mx-10  my-10 py-5"  >
                            <v-row class="HR px-2 py-5 px-5">
                    
                                    <p>HR HIRING DASHBOARD</p>
                    
                            </v-row>

                 <v-row>
                        <v-col  cols="1" sm="3"  > 
                                        <label class="p1 mx-5">Open Positions</label>
                                        <b><label class="p2  py-3 mx-5"  >48</label></b> 
                         </v-col>
                        <v-col  cols="1" sm="3"> 
                                        <label class="p1 mx-5 ">Newly Hired </label>
                                        <b><label   class="p2  mx-5 py-3"  >15</label></b> 
                        </v-col>
                        <v-col  cols="1"  > 
                                        <label class="p1 mx-5 " >TotalEmployees</label>
                                        <b><label   class="p2  mx-5 py-3"  >25,000</label></b> 
                        </v-col>

                </v-row>
            </v-col>
            <v-col cols=3>
                           <v-card class="my-3">
                                    <v-card-title  >
                                        <v-icon color="pink" x-large >mdi-account</v-icon>
                                        Admin
                                    </v-card-title>

                            </v-card>

                             <v-card class="my-3">
                                <v-card-title  >
                                    <v-icon   color="blue" x-large>mdi-account-outline</v-icon>
                              Employees
                                <v-spacer></v-spacer>
                                <span style="font-size:20px; font-color:blue;" >{{this.count["Employee"]}}</span>
                                </v-card-title>
                           
                         
                            </v-card>

                             <v-card >  
                                    <v-card-title  >
                                        <v-icon   color="green" x-large>mdi-account-lock</v-icon>
                                        Users
                                         <v-spacer></v-spacer>
                                        <span style="font-size:20px; font-color:blue;" 
                                        >{{this.count["User"]}}</span>
                               
                                        </v-card-title>
                                

                            </v-card>                    
            </v-col>

             <v-col cols=3>
                         <v-card class="my-3">
                                <v-card-title  >
                                    <v-icon   color="black" x-large>mdi-domain</v-icon>  
                                    Company
                                     <v-spacer></v-spacer>
                                        <span style="font-size:20px; font-color:blue;" 
                                        >{{this.count["Company"]}}</span>
                                </v-card-title>
                
                            </v-card>


                             <v-card>
                                    <v-card-title  >
                                        <v-icon   color="teal" x-large>mdi-account-group</v-icon>
                                        Department
                                         <v-spacer></v-spacer>
                                        <span style="font-size:20px; font-color:blue;" 
                                        >{{this.count["Department"]}}</span>
                                    </v-card-title>
                              
                            </v-card>


                             <v-card class="my-3">
                                    <v-card-title  >
                                        <v-icon   color="orange" x-large>mdi-chart-pie</v-icon>
                                        Sections
                                         <v-spacer></v-spacer>
                                        <span style="font-size:20px; font-color:blue;" 
                                        >{{this.count["Section"]}}</span>
                                    </v-card-title>
                                    
                            </v-card>
                            
            </v-col>
            
            
           
            
        </v-row>

<v-divider></v-divider>

           <v-card-text>
                      <highcharts :options="chartOptions"></highcharts>
           </v-card-text>

        </v-card>

</template>

<script>
export default {
    data(){
        return{
              img:require('../../images/acc1.png'),
              count:[],
              chartOptions:{
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Monthly Average Rainfall'
                    },
                    subtitle: {
                        text: 'Source: WorldClimate.com'
                    },
                    xAxis: {
                        categories: [
                            'Jan',
                            'Feb',
                            'Mar',
                            'Apr',
                            'May',
                            'Jun',
                            
                            'Jul',
                            'Aug',
                            'Sep',
                            'Oct',
                            'Nov',
                            'Dec'
                        ],
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Rainfall (mm)'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [{
                        name: 'Tokyo',
                        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

                    }, {
                        name: 'New York',
                        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

                    }, {
                        name: 'London',
                        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

                    }, {
                        name: 'Berlin',
                        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

                    }]
                }
                        }
    },
    created(){
        axios.get('api/home' ).then(res=>{
                    this.count=res.data
                    console.log(this.count)
        })
          
    }

}
</script>

<style scoped>
.HR{
    background-color: burlywood;
    width:100%;
    height:80px;
    text-align: center;
    font-family: arial;
    color:darkmagenta;
    font-size:25px;

}

.p1{
background-color: lightpink;
width:100px;
text-align: center;
}


.p2{
height:50px;
width:100px;
text-align: center;
border: 1px solid grey;
font-size: 20px;
}

.cl{
    background-color: yellow;
    height: 10px;
}

.count{
    text-align:center;
}
</style>