<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

const isAuth = ref(false);

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <div class="nav">
      <div class="nav-inner">
        <RouterLink class="logo" to="/">Travel Planner</RouterLink>
        <div class="mobile-nav">
          <form @submit.prevent="logout" v-if="$page.props.auth.user">
            <DropdownLink as="button">Log Out</DropdownLink>
          </form>
          <NavLink class="mb-nav-btn" :href="route('login')" :active="route().current('login')" v-else>Login</NavLink>
          <NavLink class="mb-nav-btn" :href="route('home')" :active="route().current('home')">Home</NavLink>
          <NavLink class="mb-nav-btn" :href="route('Contact')" :active="route().current('Contact')">Contact</NavLink>
          <NavLink class="mb-nav-btn" :href="route('Planner')" :active="route().current('Planner')">Start</NavLink>
        </div>

        <button class="hamburger"><div class="bar"></div></button>
        <div class="links">
          <NavLink :href="route('home')" :active="route().current('home')">Home</NavLink>
          <NavLink :href="route('Contact')" :active="route().current('Contact')">Contact</NavLink>
        </div>
        <div class="s-l-btn">
            <NavLink class="nav-btn" :href="route('Planner')" :active="route().current('Planner')">Start</NavLink>
            <form @submit.prevent="logout" v-if="$page.props.auth.user">
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <div class="ms-3 relative">
                    <!-- Teams Dropdown -->
                    <Dropdown v-if="$page.props.jetstream.hasTeamFeatures" align="right" width="60">
                        <template #trigger>
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                    {{ $page.props.auth.user.current_team.name }}
                                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </button>
                            </span>
                        </template>

                        <template #content>
                            <div class="w-60">
                                <!-- Team Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400"> Manage Team</div>
                                    <!-- Team Settings -->
                                    <DropdownLink :href="route('teams.show', $page.props.auth.user.current_team)">Team Settings</DropdownLink>
                                    <DropdownLink v-if="$page.props.jetstream.canCreateTeams" :href="route('teams.create')"> Create New Team</DropdownLink>

                                    <!-- Team Switcher -->
                                    <template v-if="$page.props.auth.user.all_teams.length > 1">
                                        <div class="border-t border-gray-200" />

                                        <div class="block px-4 py-2 text-xs text-gray-400">Switch Teams</div>
                                            <template v-for="team in $page.props.auth.user.all_teams" :key="team.id">
                                                <form @submit.prevent="switchToTeam(team)">
                                                    <DropdownLink as="button">
                                                        <div class="flex items-center">
                                                            <svg v-if="team.id == $page.props.auth.user.current_team_id" class="me-2 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                                path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            <div>{{ team.name }}</div>
                                                        </div>
                                                    </DropdownLink>
                                                </form>
                                            </template>
                                    </template>
                            </div>
                        </template>
                    </Dropdown>
                </div>

                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <Dropdown align="right" width="48">
                        <template #trigger>
                            <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
                            </button>

                            <span v-else class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                    {{ $page.props.auth.user.name }}

                                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
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

                            <div class="border-t border-gray-200" />

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
          <NavLink class="nav-btn" :href="route('login')" :active="route().current('login')" v-else>Login</NavLink>
        </div>
      </div>
    </div>
</template>


<script>
export default {
 data() {
   return {
     showMenu: false,
     isauth:true
   };
 },
 methods: {
   toggleMobileMenu() {
     this.showMenu = !this.showMenu;
   },
 },
 
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

 background-color: white;
 color: rgb(255, 0, 0);
 box-shadow: 0px 0.4px 7.5px rgb(121, 121, 121);
}


.links {
 padding: 5px;
 margin-right: 40px;
 display: flex;
 gap: 170px;
}

.logo {
 position: relative;
 font-weight: 700;
 font-size: 2em;
 background: linear-gradient(to top, #eb396e, #ff5454);
   color: transparent;
   -webkit-background-clip: text;
   background-clip: text;
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
 background-image: linear-gradient(to right, #cc2e5d, #ff5858);
 border-radius: 8px;

 color: #fff;
 font-size: 18px;
 font-weight: 700;
 text-align: center;

 box-shadow: 3px 3px rgba(0, 0, 0, 0.4);
 transition: 0.4s ease-out;

 &:hover {
   box-shadow: 6px 6px rgba(0, 0, 0, 0.6);
 }
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
 background: linear-gradient(to right, #cc2e5d, #ff5858);
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
 background-color: rgba(235, 235, 235, 0.8);
 padding-top: 40px;
 transition: 0.4s;
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
 background-color: rgb(255, 255, 255);
 text-decoration: none;
 border-radius: 10px;
 padding: 15px;
}

@media (min-width: 1400px) {
 .mobile-nav {
   display: none;
 }
 .hamburger {
   display: none;
 }
}
@media (max-width: 1400px) {
 .links {
   display: none;
 }
 .nav-btn {
   display: none;
 }
 .b-start {
   display: none;
 }
 .s-l-btn {
   display: none;
 }
 .mobile-nav {
   height: 100%;
   max-height: 1000px;
 }
}
</style>