<template>
  <div class="home">
    <!-- <img alt="Vue logo" src="../assets/logo.png"> -->
    <!-- <HelloWorld msg="Welcome to Your Vue.js App"/> -->
<!--   <Header /> -->
  <div class="container home" >
 
    <div class="container col-lg-5 pt-5 pb-5">
      <Sign />
      
    </div>
    
  </div>

  

  </div>
</template>

<script>
import Sign from '../components/Sign.vue'

export default {
  name: 'Home',
  data(){
    return{
      userid:null,
      isAuth:false,
    }
  },
  components: {
    Sign,
  },
  methods:{

  }
}
</script>
 
 <style >
.home{
  width: 100%;
  max-width: 100%;

  height: 100vh;
  background-image: url('../assets/img/shutterstock_746018851.jpg') ;
    background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
}



 ul {
   padding:0!important ;
 }
 .inputField{
  margin: 20px 0;
  width: 100%;
  
  height: 45px;
}
 .inputField span{
  font-size: 30px;
  font-weight: 600;
}
.inputField input{
  width: 85%;
  height: 100%;
  outline: none;
  border-radius: 3px;
  border: 1px solid #ccc;
  font-size: 17px;
  padding-left: 15px;
  transition: all 0.3s ease;
  float: right;
 
}
.inputField input:focus{
  border-color: #8E49E8;
}
.inputField button{
  width: 50px;
  height: 100%;
  border: none;
  color: #fff;
  margin-left: 5px;
  font-size: 21px;
  outline: none;
  background: #8E49E8;
  cursor: pointer;
  border-radius: 3px;
  opacity: 0.6;
  pointer-events: none;
  transition: all 0.3s ease;
}
.inputField button:hover,
.footer button:hover{
  background: #721ce3;
}
.inputField button.active{
  opacity: 1;
  pointer-events: auto;
}
.wrapper .todoList{
  max-height: 250px;
  overflow-y: auto;
}
.todoList li{
  position: relative;
  list-style: none;
  height: 45px;
  line-height: 45px;
  margin-bottom: 8px;
  background: #f2f2f2;
  border-radius: 3px;
  padding: 0 15px;
  cursor: default;
  overflow: hidden;
}
.todoList li .icon{
  position: absolute;
  right: -45px;
  background: #e74c3c;
  width: 45px;
  text-align: center;
  color: #fff;
  border-radius: 0 3px 3px 0;
  cursor: pointer;
  transition: all 0.2s ease;
}
.todoList li:hover .icon{
  right: 0px;
}
.wrapper .footer{
  display: flex;
  width: 100%;
  margin-top: 20px;
  align-items: center;
  justify-content: space-between;
}
.footer button{
  padding: 6px 10px;
  border-radius: 3px;
  border: none;
  outline: none;
  color: #fff;
  font-weight: 400;
  font-size: 16px;
  margin-left: 5px;
  background: #8E49E8;
  cursor: pointer;
  user-select: none;
  opacity: 0.6;
  pointer-events: none;
  transition: all 0.3s ease;
}
.footer button.active{
  opacity: 1;
  pointer-events: auto;
}

 </style>