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

defineProps({
    title: String,
});

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
          <NavLink class="mb-nav-btn" :href="route('page')" :active="route().current('page')">Start</NavLink> <br> <br>

          <div v-if="$page.props.auth.user" class="open-ham" style="width: 100%; display: flex; justify-content: center; align-items: center; flex-direction: column;">
            <!-- Profile Photo -->
            <img class="h-10 w-10 rounded-full object-cover" style="grid-template-columns: auto;" :src="$page.props.auth.user.profile_photo_url.split('http://localhost/storage/').pop()">        
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
          <NavLink :href="route('home')" :active="route().current('home')" style="color: #ffffff;">Home</NavLink>
          <NavLink :href="route('Contact')" :active="route().current('Contact')" style="color: #ffffff;">Contact</NavLink>
          <NavLink :href="route('popular')" :active="route().current('popular')" style="color: #ffffff;">PopularPlaces</NavLink>
          <NavLink :href="route('page')" :active="route().current('page')" style="color: #ffffff;">Start</NavLink>

        </div>
        <div class="s-l-btn">
            
            <form @submit.prevent="logout" v-if="$page.props.auth.user">
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                  
                  <!-- Profile Photo -->
                  <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url.split('http://localhost/storage/').pop()">                  
                  

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
              <NavLink class="nav-btn" :href="route('login')" :active="route().current('login')">Login</NavLink>&ensp;
              <NavLink class="nav-btn" :href="route('register')" :active="route().current('register')">Register</NavLink>
            </div>
        </div>
      </div>
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
 position: sticky;
 z-index: 90;
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
 padding: 0 16px;
 background-image: linear-gradient(to right, #78d3e6, #2b668e);
 box-shadow: 0px 0.4px 3.5px rgb(46, 98, 219);
 
}


.links {
 padding: 5px;
 margin-right: 40px;
 display: flex;
 gap: 170px;
 
}

.nav-btn {
 appearance: none;
 outline: none;
 border: none;
 background: none;
 cursor: pointer;
 width: 100px;
 display: inline-block;
 padding: 5px 0px;
 background-image: linear-gradient(to right, #a79678, #646337);
 border-radius: 8px;
 color: #fff;
 font-size: 18px;
 font-weight: 700;
 text-align: center;
 box-shadow: 3px 3px rgba(0, 0, 0, 0.4);
 transition: 0.4s ease-out;
 right: 20px;
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
    padding: 0 30px; 
  }
  .links {
    gap: 30px;
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
body{
  background-color:#f8f3e6;
}
</style>