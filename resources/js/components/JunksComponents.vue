<template>
<v-row class="pa-10">
    
<v-col cols=6>
<v-hover v-slot="{ hover }">
              <v-expand-transition>
                      <v-card  height="300px"  v-show="show">
                          <v-card-title  class="cyan lighten-3 ">
                                  <div class="pa-1">
                                      <v-badge
                                            color="pink"
                                            :content="CategoryData['Company']"
                                          >
                                              Company
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
                                  style="height:227.5px;  background-color:green"
                                  @click="viewdialog('company'), dialog=!dialog"
                                >company
                          </div>
                      </v-expand-transition>                  
                    </v-card>
                </v-expand-transition>
 </v-hover>
              <template  >
                       <v-dialog  v-model="dialog" width="50%"  >
                     
                              <v-card >
                                <v-img 
                                height="200px" width="650px"
                                      margin-top="20px"
                                   :src="ImgUrl">
                                  </v-img>
                                   
                                   <v-card-title>
                                   <div class="text-center" >
                                              <v-btn    
                                              class="mx-15"   
                                              color="primary" icon>
                                              <v-icon
                                              fab
                                               large>mdi-rotate-right</v-icon>  
                                               
                                               </v-btn>
                                               
                                                <v-btn    
                                                color="primary" icon>
                                              <v-icon
                                              fab
                                               large>mdi-check</v-icon>  
                                               </v-btn>
                                                                                        
                                        </div>
                                         

                                   </v-card-title>


                                <v-card-text>
                                      <v-simple-table>
                                          <thead>
                                              <th>No</th>
                                              <th>Company Name</th>
                                              <th> Select</th>
                                            
                                          </thead>
                                          <tbody>
                                          <tr v-for="(item , index) in deletedData" :key="index">
                                          <td>{{index + 1}}</td>
                                          <td>{{item.name}}</td>
                                           <td>
                                            <v-checkbox v-model="item.retrieveFlg">
                                            </v-checkbox>
                                           </td>
                                          </tr>
                                          </tbody>
                                          </v-simple-table>
                                          </v-card-text>
                                          <v-card-actions>

                           

                                       
                                                   
                                          </v-card-actions>
                                          </v-card>
                                          </v-dialog>
                                          </template>
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
                                            :content="CategoryData['Department']"
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
                                        @click="viewdialog('department'),  dialog=!dialog"
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
                 :content="CategoryData['Section']"

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
            @click="viewdialog('section'),  dialog=!dialog"
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
                 :content="CategoryData['Employee']"
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
               @click="viewdialog('employee'),  dialog=!dialog"
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
      CategoryData:[],
      dialog:false,
      ImgUrl: require('../../images/company.jpeg'),
      companies_deleted:[],
      isRetrieve:false,
      CategoryData:[],
      categories:null,
      get_deleted:[],
      category:null,
      

    }
  },

created(){
        axios.get('api/junks').then(res=>{
         
            this.CategoryData =res.data
            // console.log(this.CategoryData )
            // adding deleteflg as column
            var i=0
       for (i = 0; i < this.CategoryData.length; i++) {
           Vue.set(this.CategoryData[i], 'deleteflg' , false)
                // console.log(this.companies_deleted[i]) 
            }
        })
},



computed:{     
  deletedData(){
              if(this.category=='company'){
                    return this.CategoryData["Company_del"]
                   
              }else if (this.category=='department'){
                    return this.CategoryData["Department_del"]
                  
              }else if (this.category=='section'){
                     return this.CategoryData["Section_del"]
              }else if (this.category=='employee'){
                    return this.CategoryData["Employee_del"]
              }
  }
},


  methods: {
        viewdialog(category){
              this.category=category
             var i=0

            for(i = 0 ; i < this.deletedData.length; i++){
              if(this.category=='company'){
                  Vue.set(this.deletedData[i], 'id' ,this.deletedData[i].company_code)
                  Vue.set(this.deletedData[i], 'name' ,this.deletedData[i].company_name)
              }else if (this.category=='department'){
                   Vue.set(this.deletedData[i], 'id' ,this.deletedData[i].department_code)
                   Vue.set(this.deletedData[i], 'name' ,this.deletedData[i].department_name)
              }else if (this.category=='section'){
                   Vue.set(this.deletedData[i], 'id' ,this.deletedData[i].section_code)
                   Vue.set(this.deletedData[i], 'name' ,this.deletedData[i].section_name)  
              }else if (this.category=='employee'){
                    Vue.set(this.deletedData[i], 'id' ,this.deletedData[i].employee_code)
                   Vue.set(this.deletedData[i], 'name' ,this.deletedData[i].employee_name)  
              }
                
                Vue.set(this.deletedData[i], 'retrieveFlg' ,false)
               }


                 

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
  .img{
  object-fit: cover;
  }
</style>

﻿


