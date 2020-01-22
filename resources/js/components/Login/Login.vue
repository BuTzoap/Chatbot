<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100">
                        <div class="login100-pic js-tilt" data-tilt>
                            <img src="images/img-01.png" alt="IMG">
                        </div>
        
                        <form class="login100-form validate-form" method="POST" action="">
                            <span class="login100-form-title">
                                    Welcome to Motofiixthailand
                            </span>
        
                            <div class="wrap-input100 validate-input" >
                                <input  placeholder="Email" type="email" class="form-control" name="email" value="" required autocomplete="email" autofocus>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                            </div>

        
                            <div class="wrap-input100 validate-input" data-validate = "Password is required">
                                <input  placeholder="Password" type="password" class="form-control" name="password" required autocomplete="current-password">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>


                            <!-- <div class="wrap-input100 validate-input" data-validate = "Password is required">
                                    <input class="form-check-input" type="checkbox" name="remember"  >

                                    <label class="form-check-label" for="remember">
                                    </label>
                            </div> -->
                            
                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn">
                                    Login
                                </button>
                            </div>
        
                            <!-- <div class="text-center p-t-12">
                                <span class="txt1">
                                    Forgot Your
                                </span>
                                <a class="txt2" href="">
                                    </a>

                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            articles:[],
            article:{
                id:'',
                name:'',
                body:''
            },
            article_id:'',

        }
    }
}
</script>