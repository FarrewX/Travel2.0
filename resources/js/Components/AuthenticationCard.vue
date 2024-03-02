<template>
    <div class="backg min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-cover relative">
      <div class="absolute inset-0" style="background-image: url('https://a.cdn-hotels.com/gdcs/production183/d1163/98f4f875-b4db-445b-ab7b-c5d07b63838e.jpg?impolicy=fcrop&w=800&h=533&q=medium'); background-size: cover; filter: blur(20px); filter: brightness(60%);">
      </div>
  
      <div style="z-index: 1;">
        <slot name="logo"/>
      </div>
  
      <div class="w-full sm:max-w-md mt-6 px-6 py-4  bg-gray-100 shadow-md overflow-hidden sm:rounded-lg" style="background-color: #f8f3e6; position: relative; z-index: 1;">
        <slot />
      </div>
    </div>
  </template>
  
  <style>
  .backg {
    position: relative;
    z-index: 1;
  }
  </style>
  