<template>
  <div style="background-color: #666666">
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          
          <q-form
            class="login100-form validate-form"
          >
          
          <div>
            <img alt="Quasar logo" src="~assets/shield.svg" style="width: 100px; height: 100px" />
            <span class="q-ml-sm">Safe Track</span>
          </div>
            <span class="login100-form-title p-b-43">
              Entrada del sistema
            </span>

            <q-input
              outlined
              v-model="email"
              label="Email"
              class="col-xs-12 col-sm-6 col-md-8 q-pa-xs wrap-input100"
              lazy-rules
            />
            <q-input
              outlined
              v-model="password"
              label="Password"
              :type="isPwd ? 'password' : 'text'"
              hint=""
              class="col-xs-12 col-sm-6 col-md-4 q-pa-xs  wrap-input100"
            >
              <template v-slot:append>
                <q-icon
                  :name="isPwd ? 'visibility_off' : 'visibility'"
                  class="cursor-pointer"
                  @click="isPwd = !isPwd"
                />
              </template>
            </q-input>

            <div class="container-login100-form-btn ">
              <q-btn color="white" text-color="primary" label="Push" class="login100-form-btn" />
              <q-btn type="submit" label="Guardar" color="primary" @click="onSubmit()" class="login100-form-btn" />
              
            </div>
          </q-form>

          <div
            class="login100-more"
            style="background-image: url('./images/bg-01.jpg')"
          ></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  name: "LoginPage",
  data() {
    return {
      email: "",
      password: "",
      isPwd: true,
    };
  },
  methods: {
    onSubmit(){
      window.location.replace('#/home');
    }
  },
});
</script>
<style scoped>

* {
	margin: 0px; 
	padding: 0px; 
	box-sizing: border-box;
}

body, html {
	height: 100%;
}
.limiter {
  width: 100%;
  margin: 0 auto;
}
.container-login100 {
  width: 100%;
  min-height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  background: #f2f2f2;
}
.wrap-login100 {
  width: 100%;
  background: #fff;
  overflow: hidden;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  align-items: stretch;
  flex-direction: row-reverse;
}
/*==================================================================
[ login more ]*/
.login100-more {
  width: calc(100% - 560px);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  position: relative;
  z-index: 1;
}
.login100-more::before {
  content: "";
  display: block;
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background: rgba(0, 0, 0, 0.1);
}

/*==================================================================
[ Form ]*/
.login100-form {
  width: 560px;
  min-height: 100vh;
  display: block;
  background-color: #f7f7f7;
  padding: 25px 55px 55px 55px;
}

.login100-form-title {
  width: 100%;
  display: block;
  font-size: 30px;
  color: #333333;
  line-height: 1.2;
  text-align: center;
  padding-top: 10px;
}

/*------------------------------------------------------------------
[ Button ]*/
.container-login100-form-btn {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content:space-between;
}

.login100-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  width: 48%;
  height: 50px;
  border-radius: 10px;
  color: #fff;
  line-height: 1.2;
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-top: 1em;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.login100-form-btn:hover {
  background: #333333;
}

.wrap-input100 {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  align-items: flex-end;
  width: 100%;
  height: 70px;
  position: relative;
  border-radius: 10px;
  margin-bottom: 10px;
}

.label-input100 {
  font-family: Montserrat-Regular;
  font-size: 18px;
  color: #999999;
  line-height: 1.2;
  display: block;
  position: absolute;
  pointer-events: none;
  width: 100%;
  padding-left: 24px;
  left: 0;
  top: 30px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}
.input100 {
  display: block;
  width: 100%;
  background: transparent;
  font-size: 18px;
  color: #555555;
  line-height: 1.2;
  padding: 0 26px;
}
/*------------------------------------------------------------------
[ Responsive ]*/

@media (max-width: 992px) {
  .login100-form {
    width: 50%;
    padding-left: 30px;
    padding-right: 30px;
  }

  .login100-more {
    width: 50%;
  }
}

@media (max-width: 768px) {
  .login100-form {
    width: 100%;
  }

  .login100-more {
    display: none;
  }
}

@media (max-width: 576px) {
  .login100-form {
    padding-left: 15px;
    padding-right: 15px;
    padding-top: 70px;
  }
}
</style>
