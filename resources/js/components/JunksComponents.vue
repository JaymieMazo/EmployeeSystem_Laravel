<template>
<v-row class="pa-10">
    
<v-col cols=6>
<v-hover v-slot="{ hover }">
<v-expand-transition>
  <v-card  @click="company()" height="300px"  v-show="show">
      <v-card-title  class="cyan lighten-3 ">
              <div class="pa-1">
                  <v-badge
                        color="pink"
                        :content="count['Company']"
                      >
                          Company
                      </v-badge> 
              </div>
      </v-card-title>


<template >

 <v-dialog  v-model="dialog" width="50%"  >
 
                <template v-slot:activator="{on, attrs}">
                      <v-expand-transition>
                            <div 
                                    v-if="hover"
                                    class="d-flex 
                                    transition-fast-in-fast-out
                                    grey lighten-1
                                    v-card--reveal 
                                    display-3 
                                    white--text"
                                    style="height:227.5px;  background-color:green"
                                  v-on="on" 
                                  v-bind="attrs" 
                                  @click="company()"
                                  >company
                            </div>
                        </v-expand-transition>

              </template>


            <v-card >
              <v-img  margin-top="20px" height="200px" width="650px" :src="ImgUrl"></v-img>
              <v-card-text>
                    <v-simple-table>
                        <thead>
                            <th>No</th>
                            <th>Company Name</th>
                            <th> Retrieve</th>
                           
                        </thead>
                        <tbody>
                              <tr v-for="(item, index) in companies_deleted" :key="index">
                                <td>{{index + 1}}</td>
                                <td>{{item.company_name}}</td>
                                <td>
                                <v-checkbox  v-model="companies_deleted[index].deleteflg" 
                                  @click="retrieve(index , )"
                                
                                ></v-checkbox></td>
                              </tr>
                        </tbody>
                    </v-simple-table>
              </v-card-text>
            </v-card>
  </v-dialog>
  </template>



  
 </v-card>
  </v-expand-transition>
 </v-hover>



  </v-col>
  <!-- department -->
<v-col cols=6>
              <v-hover v-slot="{hover}">
              <v-expand-transition>
                    <v-card  height="300px"  v-show="show">
                    <v-card-title  class="cyan lighten-3 ">

                    <div class="pa-1">
                        <v-badge
                              color="pink"
                              :content="count['Department']"
                            >
                                Department
                            </v-badge>
                    </div>
                    </v-card-title>

                    <v-expand-transition>
                        <div
                          v-if="hover"
                          class="d-flex 
                          transition-fast-in-fast-out
                          grey lighten-1
                          v-card--reveal 
                          display-3 
                          white--text"
                          style="height: 227.5px;"
                        >
                        Department
                        </div>
                      </v-expand-transition>

                
                  </v-card>
                  </v-expand-transition>
              </v-hover>
  </v-col>



 <v-col cols=6>
<v-hover v-slot="{ hover }">
<v-expand-transition>
  <v-card height="300px"   v-show="show"  > 
   <v-card-title  class="cyan lighten-3 ">
      <div class="pa-1">
          <v-badge
                color="pink"
                 :content="count['Section']"
              >
                  Sections
              </v-badge>
      </div>
      </v-card-title>

      <v-expand-transition>
          <div
            v-if="hover"
            class="d-flex 
            transition-fast-in-fast-out
             grey lighten-1
             v-card--reveal 
             display-3 
             white--text"
            style="height: 227.5px;"
          >
          Sections
          </div>
        </v-expand-transition>

  </v-card >
  </v-expand-transition>
</v-hover>
</v-col>


<v-col>
<v-hover v-slot="{ hover }" >
<v-expand-transition>
      <v-card  height="300px"  v-show="show">
      <v-card-title  class="cyan lighten-3 ">

      <div class="pa-1">
          <v-badge
                color="pink"
                 :content="count['Employee']"
              >
                  Employees
              </v-badge>
      </div>
      </v-card-title>

      <v-expand-transition>
          <div
            v-if="hover"
            class="d-flex 
            transition-fast-in-fast-out
             grey lighten-1
             v-card--reveal 
             display-3 
             white--text"
            style="height: 227.5px;"
          >
          Employees
          </div>
        </v-expand-transition>
    </v-card>
    </v-expand-transition>
    </v-hover>

</v-col>


  </v-row>

  
</template>

<script>
export default {
 
  data () {
    return {
      show:false,
      count:[],
      dialog:false,
      ImgUrl: require('../../images/company.jpeg'),
      companies_deleted:[],
      isRetrieve:false,
      deleteddata:[]
    }
  },


created(){
        axios.get('api/junks').then(res=>{
            this.count =res.data
            this.companies_deleted =res.data["Company_del"]
            var i=0
       for (i = 0; i < this.companies_deleted.length; i++) {
           Vue.set(this.companies_deleted[i], 'deleteflg' , false)
                console.log(this.companies_deleted[i])
            }
        })
},



  methods: {
        company(){
          this.dialog=true
        }, 

        retrieve(index){
          Vue.set(this.companies_deleted, 'company')
          console.log(this.companies_deleted[index])

          }, 

  }, 

  mounted(){
    this.show=true
  }, 

  
}
</script>
<style scoped>


</style>

﻿


