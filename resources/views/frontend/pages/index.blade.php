<x-landing-layout>
  <!-- resources/views/frontend/pages/index.blade.php -->
  
  @php
  $heroSetting = \App\Models\HeroSetting::first();
  @endphp
  
  <div class="h-screen w-full bg-cover bg-center" style="background-image: url('{{ $heroSetting ? asset('storage/' . $heroSetting->background_image) : asset('frontend/img/web/enmarcado.jpg') }}');">
      <div class="mx-auto h-full px-4 py-28 md:py-40 sm:max-w-xl md:max-w-full md:px-24 lg:max-w-screen-xl lg:px-8">
          <div class="flex flex-col items-center justify-between lg:flex-row">
              <div class="mb-20">
                  <div class="lg:max-w-xl lg:pr-5">
                      <p class="flex text-sm uppercase text-gray-300">
                          <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 inline h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd" />
                          </svg>
                          {{ $heroSetting ? $heroSetting->subtitle : 'An agency for high growth startups' }}
                      </p>
                      <h2 class="mb-6 max-w-lg text-5xl font-bold leading-snug tracking-tight text-white sm:text-7xl sm:leading-snug">
                          {{ $heroSetting ? $heroSetting->title : 'We make you look' }}
                          <span class="my-1 inline-block border-b-8 border-white bg-orange-400 px-4 font-bold text-white">
                              {{ $heroSetting ? 'different' : '' }}
                          </span>
                      </h2>
                      <p class="text-base text-gray-400">
                          {{ $heroSetting ? $heroSetting->subtitle : 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque it.' }}
                      </p>
                  </div>
                  <div class="mt-10 flex flex-col items-center md:flex-row">
                      <a href="{{ $heroSetting ? $heroSetting->button_url : '/' }}" class="mb-3 inline-flex h-12 w-full items-center justify-center rounded bg-blue-700 px-6 font-medium tracking-wide text-white shadow-md transition md:mr-4 md:mb-0 md:w-auto focus:outline-none hover:bg-blue-800">
                          {{ $heroSetting ? $heroSetting->button_text : 'Stream Now' }}
                      </a>
                      <a href="/" aria-label="" class="group inline-flex items-center font-semibold text-white">
                          Watch how it works
                          <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:translate-x-2 ml-4 h-6 w-6 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                          </svg>
                      </a>
                  </div>
              </div>
              <div class="relative hidden lg:ml-32 lg:block lg:w-1/2">
                  <img src="{{ asset('frontend/img/web/frame.svg') }}" alt="Frame Image" class="w-full h-auto">
              </div>
          </div>
      </div>
  </div>
  
  <div class="mt-48 mx-auto max-w-screen-lg overflow-hidden rounded-xl border shadow-lg md:pl-8">
      <div class="flex flex-col overflow-hidden bg-white sm:flex-row md:h-80">
          <div class="flex w-full flex-col p-4 sm:w-1/2 sm:p-8 lg:w-3/5">
              <h2 class="text-xl font-bold text-gray-900 md:text-2xl lg:text-4xl">Winter Collection</h2>
              <p class="mt-2 text-lg">By Luis Vuitton</p>
              <p class="mt-4 mb-8 max-w-md text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam iusto, cumque dolores sit odio ex.</p>
              <a href="#" class="group mt-auto flex w-44 cursor-pointer select-none items-center justify-center rounded-md bg-black px-6 py-2 text-white transition">
                  <span class="group flex w-full items-center justify-center rounded py-1 text-center font-bold"> Shop now </span>
                  <svg class="flex-0 group-hover:w-6 ml-4 h-6 w-0 transition-all" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                  </svg>
              </a>
          </div>
    
          <div class="order-first ml-auto h-48 w-full bg-gray-700 sm:order-none sm:h-auto sm:w-1/2 lg:w-2/5">
              <img class="h-full w-full object-cover" src="https://images.unsplash.com/photo-1599751449128-eb7249c3d6b1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1169&q=80" loading="lazy" />
          </div>
      </div>
  </div>
  </x-landing-layout>
  
  