<script setup>
  import { ref } from 'vue';
  import { Head, Link, router } from '@inertiajs/vue3';
  import Banner from '@/Components/Banner.vue';
  import Dropdown from '@/Components/Dropdown.vue';
  import DropdownLink from '@/Components/DropdownLink.vue';
  import NavLink from '@/Components/NavLink.vue';
  import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';

const toggleMobileMenu = () => {
    const menu_btn = document.querySelector('.hamburger');
    const mobile_menu = document.querySelector('.mobile-nav');

    menu_btn.classList.toggle('is-active');
    mobile_menu.classList.toggle('is-active');
};

const logout = () => {
    router.post(route('logout'));
};

</script>

<template>
  <Banner />
    <div class="nav">
      <div class="nav-inner">
        <NavLink style="font-size: 32px; color: #000;" :href="route('home')">
          <AuthenticationCardLogo />
        </NavLink>
        <div class="mobile-nav">
          <form @submit.prevent="logout" v-if="$page.props.auth.user">
            
          </form> 
          <div v-else class="log-reg">
            <NavLink class="mb-nav-btn log-reg-btn" :href="route('login')" :active="route().current('login')" >Login</NavLink>
            <NavLink class="mb-nav-btn log-reg-btn" :href="route('register')" :active="route().current('register')">Register</NavLink>
          </div>
          <br><br>
          <NavLink class="mb-nav-btn" :href="route('home')" :active="route().current('home')">Home</NavLink>
          <NavLink class="mb-nav-btn" :href="route('Contact')" :active="route().current('Contact')">Contact</NavLink>
          <NavLink class="mb-nav-btn" :href="route('popular')" :active="route().current('popular')">PopularPlaces</NavLink>
          <NavLink class="mb-nav-btn" :href="route('page')" :active="route().current('page')">Start</NavLink>
          <NavLink class="mb-nav-btn" :href="route('detailpage')" :active="route().current('detailpage')">Details</NavLink> <br> <br>

          <div v-if="$page.props.auth.user" class="open-ham" style="width: 100%; display: flex; justify-content: center; align-items: center; flex-direction: column;">
            <!-- Profile Photo -->
            <img class="h-20 w-20 rounded-full object-cover" style="grid-template-columns: auto;" :src="$page.props.auth.user.profile_photo_url.split('http://127.0.0.1:8000/storage/').pop()">        
            <!-- Settings Dropdown in hambuger-->
            <Dropdown align="right" width="48">
                        <template #trigger>
                            <div @click="toggleProfileMenu" v-if="$page.props.jetstream.name" class="flex text-sm border-2 border-transparent focus:outline-none focus:border-gray-300 transition"></div>
                            <span v-else class="inline-flex rounded-md dropdown-btn">
                                <div type="button" @click="toggleProfileMenu" class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md focus:outline-none transition ease-in-out duration-150">
                                    {{ $page.props.auth.user.name }}
                                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                  </div>
                            </span>
                        </template>

                        <template #content>
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                Manage Account
                            </div>

                            <DropdownLink :href="route('profile.show')">
                                Profile
                            </DropdownLink>

                            <DropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">
                                API Tokens
                            </DropdownLink>

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form @submit.prevent="logout">
                                <DropdownLink as="button">
                                    Log Out
                                </DropdownLink>
                            </form>
                        </template>
                    </Dropdown>
          </div>
        </div>

        <button class="hamburger" @click="toggleMobileMenu"><div class="bar"></div></button>
        <div class="links">
          <NavLink :href="route('home')" :active="route().current('home')" style="color: #ffffff; font-size: 16px;">Home</NavLink>
          <NavLink :href="route('Contact')" :active="route().current('Contact')" style="color: #ffffff; font-size: 16px;">Contact</NavLink>
          <NavLink :href="route('popular')" :active="route().current('popular')" style="color: #ffffff; font-size: 16px;">PopularPlaces</NavLink>
          <NavLink :href="route('page')" :active="route().current('page')" style="color: #ffffff; font-size: 16px;">Start</NavLink>
          <NavLink :href="route('detailpage')" :active="route().current('detailpage')" style="color: #ffffff; font-size: 16px;">Details</NavLink>

        </div>
        <div class="s-l-btn">
            
            <form @submit.prevent="logout" v-if="$page.props.auth.user">
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                  
                  <!-- Profile Photo -->
                  <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url.split('http://127.0.0.1:8000/storage/').pop()">                  
                  

                  <!-- Settings Dropdown -->
                  <div class="ms-3 relative">
                    <Dropdown align="right" width="48">
                        <template #trigger>
                            <div @click="toggleProfileMenu" v-if="$page.props.jetstream.name" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition"></div>
                            <span v-else class="inline-flex rounded-md dropdown-btn">
                                <div type="button" @click="toggleProfileMenu" class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md focus:outline-none transition ease-in-out duration-150">
                                    {{ $page.props.auth.user.name }}
                                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                  </div>
                            </span>
                        </template>

                        <template #content style="background-color: linear-gradient(to right, #5f5659, #414040); ">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                Manage Account
                            </div>

                            <DropdownLink :href="route('profile.show')">
                                Profile
                            </DropdownLink>

                            <DropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">
                                API Tokens
                            </DropdownLink>

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form @submit.prevent="logout">
                                <DropdownLink as="button">
                                    Log Out
                                </DropdownLink>
                            </form>
                        </template>
                    </Dropdown>
                </div>
            </div>
            </form>
            <div v-else>
              <NavLink class="nav-btn" :href="route('login')" :active="route().current('login')" style="color: #ffffff;">
                <svg
                   
                    class="fill-current h-5 w-5 mr-2 mt-0.5"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    version="1.1"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                  >
                  <path
                    d="M12 0L11.34 .03L15.15 3.84L16.5 2.5C19.75 4.07 22.09 7.24 22.45 11H23.95C23.44 4.84 18.29 0 12 0M12 4C10.07 4 8.5 5.57 8.5 7.5C8.5 9.43 10.07 11 12 11C13.93 11 15.5 9.43 15.5 7.5C15.5 5.57 13.93 4 12 4M12 6C12.83 6 13.5 6.67 13.5 7.5C13.5 8.33 12.83 9 12 9C11.17 9 10.5 8.33 10.5 7.5C10.5 6.67 11.17 6 12 6M.05 13C.56 19.16 5.71 24 12 24L12.66 23.97L8.85 20.16L7.5 21.5C4.25 19.94 1.91 16.76 1.55 13H.05M12 13C8.13 13 5 14.57 5 16.5V18H19V16.5C19 14.57 15.87 13 12 13M12 15C14.11 15 15.61 15.53 16.39 16H7.61C8.39 15.53 9.89 15 12 15Z"
                  />
                </svg>Login
              </NavLink> &ensp;
              
              <NavLink class="nav-btn" :href="route('register')" :active="route().current('register')" style="color: #ffffff;">
                <svg
                  class="fill-current h-5 w-5 mr-2 mt-0.5"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                  version="1.1"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                >
                <path
                  d="M10,17V14H3V10H10V7L15,12L10,17M10,2H19A2,2 0 0,1 21,4V20A2,2 0 0,1 19,22H10A2,2 0 0,1 8,20V18H10V20H19V4H10V6H8V4A2,2 0 0,1 10,2Z"
                />
              </svg>
  
              Register
            </NavLink>
            </div>
        </div>
      </div>
    </div>
    <div class="area">
      <ul class="circles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
  </ul>
</div>
</template>

<script>
export default {
  data() {
    return {
      showMenu: false,
    };
  },
  methods: {
    toggleMobileMenu() {
      this.showMenu = !this.showMenu;
    },  
    }
};
</script>

<style scoped>

.nav {
 z-index: 999;
 left: 0;
 top: 0;
 width: 100%;
}

.nav-inner {
 height: 90px;
 width: 100%;
 display: flex;
 justify-content: space-between;
 align-items: center;
 background-image: linear-gradient(to right, #78d3e6, #2b668e);
 box-shadow: 0px 0.4px 3.5px rgb(46, 98, 219);
z-index: 999;

}


.links {
 padding: 5px;
 margin-right: 40px;
 display: flex;
 gap: 170px;
}


.s-l-btn {
 display: flex;
 gap: 20px;

}

/* hamburger */
.hamburger {
 position: relative;
 display: block;
 width: 50px;
 cursor: pointer;
 appearance: none;
 background: none;
 outline: none;
 border: none;
 padding-right: 6px;
z-index: 999;

}

.hamburger .bar,
.hamburger::after,
.hamburger::before {
 content: "";
 display: block;
 width: 100%;
 height: 5px;
 background: linear-gradient(to right, #5f5659, #414040);
 margin: 6px 0px;
 transition: 0.4s;
 border-radius: 10px;
 opacity: 100%;
 z-index: 90;
}

.hamburger.is-active .bar {
 opacity: 0;
}

.hamburger.is-active::before {
 transform: rotate(-45deg) translate(-8px, 6px);
}

.hamburger.is-active::after {
 transform: rotate(45deg) translate(-9px, -8px);
}

.mobile-nav {
 position: fixed;
 top: 0;
 right: 0;
 left: 100%;
 width: 100%;
 height: 100vh;
 display: block;
 background-color:linear-gradient(to right, #62e4c3, #2c7361);
 padding-top: 40px;
 color:linear-gradient(to right, #000000, #ffffff);
 appearance: none;
 outline: none;
 border: none;
 text-decoration: none;
 border-radius: 10px;
 border-radius: 8px;
 box-shadow: 3px 3px rgba(1, 87, 74, 0.4);
 transition: 0.4s ease-out;
 
}

.mobile-nav.is-active {
  left: 0;
  background-color: rgba(169, 169, 169, 0.8);
  z-index: 999;
}

.mb-nav-btn {
 width: 100%;
 max-width: 200px;
 margin: 0 auto 20px;
 display: block;
 text-align: center;
 padding: 5px 16px;
 margin-top: 15px;
 background-image: linear-gradient(to right, #5ad6b7, #2c7361);
 color:white;
 appearance: none;
 outline: none;
 border: none;
 text-decoration: none;
 border-radius: 10px;
 padding: 15px;
 border-radius: 8px;
 box-shadow: 3px 3px rgba(1, 87, 74, 0.4);
 transition: 0.4s ease-out;
}

.log-reg{
  display: grid;
  width: 100%;
  position:absolute;
  top: 400px;
  left: auto;
  justify-content: center;

}
.log-reg-btn{
  display: block;
  gap: 10px;
  width: 100px;
  grid-template-columns: 90px 90px;
  grid-template-rows: 40px 40px 40px;
  background-color: rgb(121, 121, 121, 0.8);
  color: white;
  border: solid rgb(0, 0, 0); /*............ */
  appearance: none;
  outline: none;
  border: none;
  background: none;
  cursor: pointer;
  background-image: linear-gradient(to right, #a79678, #646337);
  border-radius: 8px;
  color: #fff;
  box-shadow: 3px 3px rgba(0, 0, 0, 0.4);
  transition: 0.4s ease-out;
}

.dropdown-btn{
  border: solid rgb(0, 0, 0);
  appearance: none;
  outline: none;
  border: none;
  background: none;
  cursor: pointer;
  background-image: linear-gradient(to right, #a79678, #646337);
  border-radius: 8px;
  color: #fff;
  box-shadow: 3px 3px rgba(0, 0, 0, 0.4);
  transition: 0.4s ease-out;
}

/* สำหรับคอมพิวเตอร์ (PC) */
@media (min-width: 1200px) {
  .hamburger {
    display: none; 
  }
  .nav-inner {
    padding: 0 50px; 
  }
  .links {
    gap: 150px;
  }
  .open-ham{
    display: none;
  }
}

/* สำหรับแท็บเล็ต */
@media (max-width: 1200px) {
  .hamburger {
    display: none;
  }
  .nav-inner .nav-btn .mb-nav-btn {
    padding: 0 50px;
  }
  .links {
    gap: 150px;
  }
  .open-ham{
    display: none;
  }
}
@media (max-width: 1025px) {
  .hamburger {
    display: none;
  }
  .nav-inner .nav-btn .mb-nav-btn {
    padding: 0 50px; 
  }
  .links {
    gap: 80px;
  }
  .open-ham{
    display: none;
  }
}
@media (max-width: 900px) {
  .hamburger {
    display: none;
  }
  .nav-inner .nav-btn .mb-nav-btn {
    padding: 0 30px; 
  }
  .links {
    gap: 40px;
  }
  .open-ham{
    display: none;
  }
}

@media (max-width: 860px) {
  .hamburger {
    display: none;
  }
  .nav-inner .nav-btn .mb-nav-btn {
    padding: 20px; 
  }
  .links {
    gap: 20px;
  }
  .open-ham{
    display: none;
  }
}

@media (max-width: 660px) {
  .nav-inner {
    padding: 0 10px;
  }
  .links {
    display: none;
  }
  .nav-btn {
    display: none;
  }
  .open-ham{
    display:  none;
  }

  .hamburger{
    display: block;
    left: 25%;
  }
}

@media (max-width: 380px) {
  .nav-inner {
    padding: 0 10px;
  }
  .links {
    display: none;
  }
  .nav-btn {
    display: none;
  }
  .open-ham{
    display:  none;
  }

  .hamburger{
    display: block;
    left: 20%;
  }
}

</style>

<style>
@-webkit-keyframes animatetop {
	from {
		top: -300px;
		opacity: 0;
	}
	to {
		top: 0;
		opacity: 1;
	}
}
@keyframes animatetop {
	from {
		top: -300px;
		opacity: 0;
	}
	to {
		top: 0;
		opacity: 1;
	}
}
@-webkit-keyframes zoomIn {
	0% {
		opacity: 0;
		-webkit-transform: scale3d(0.3, 0.3, 0.3);
		transform: scale3d(0.3, 0.3, 0.3);
	}
	50% {
		opacity: 1;
	}
}
@keyframes zoomIn {
	0% {
		opacity: 0;
		-webkit-transform: scale3d(0.3, 0.3, 0.3);
		transform: scale3d(0.3, 0.3, 0.3);
	}
	50% {
		opacity: 1;
	}
}
/*End Animations*/
/*
-- Start BackGround Animation 
*/
.area {
  background: rgb(104, 111, 233);
  background: -webkit-linear-gradient(to left, #a2a7ff, #6267c9);
  width: 100vw;
  height: 100vh;
  position: fixed;
  z-index: -3;
  top: 0;
  border: solid red;
}

.circles {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}

.circles li {
	position: absolute;
	display: block;
	list-style: none;
	width: 20px;
	height: 20px;
	background: rgba(255, 255, 255, 0.2);
	animation: animate 25s linear infinite;
	bottom: -150px;
}

.circles li:nth-child(1) {
	left: 25%;
	width: 80px;
	height: 80px;
	animation-delay: 0s;
}

.circles li:nth-child(2) {
	left: 10%;
	width: 20px;
	height: 20px;
	animation-delay: 2s;
	animation-duration: 12s;
}

.circles li:nth-child(3) {
	left: 70%;
	width: 20px;
	height: 20px;
	animation-delay: 4s;
}

.circles li:nth-child(4) {
	left: 40%;
	width: 60px;
	height: 60px;
	animation-delay: 0s;
	animation-duration: 18s;
}

.circles li:nth-child(5) {
	left: 65%;
	width: 20px;
	height: 20px;
	animation-delay: 0s;
}

.circles li:nth-child(6) {
	left: 75%;
	width: 110px;
	height: 110px;
	animation-delay: 3s;
}

.circles li:nth-child(7) {
	left: 35%;
	width: 150px;
	height: 150px;
	animation-delay: 7s;
}

.circles li:nth-child(8) {
	left: 50%;
	width: 25px;
	height: 25px;
	animation-delay: 15s;
	animation-duration: 45s;
}

.circles li:nth-child(9) {
	left: 20%;
	width: 15px;
	height: 15px;
	animation-delay: 2s;
	animation-duration: 35s;
}

.circles li:nth-child(10) {
	left: 85%;
	width: 150px;
	height: 150px;
	animation-delay: 0s;
	animation-duration: 11s;
}

@keyframes animate {
	0% {
		transform: translateY(0) rotate(0deg);
		opacity: 1;
		border-radius: 0;
	}

	100% {
		transform: translateY(-1000px) rotate(720deg);
		opacity: 0;
		border-radius: 50%;
	}
}
/*
-- End BackGround Animation 
*/
</style>

