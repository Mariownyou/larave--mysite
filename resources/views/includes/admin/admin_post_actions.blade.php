@guest()
@else
    <span class="admin-links-floating admin-links-sticky">
{{--   <span class="admin-icon">--}}
{{--      <a href="#unfavourite" class="nu e2-admin-link e2-admin-item e2-admin-item_on" data-e2-js-action="toggle-favourite">--}}
{{--         <span class="e2-svgi">--}}
{{--            <span class="e2-toggle-state-off">--}}
{{--               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">--}}
{{--                  <path stroke="none" d="M15 6.002H9.27L7.5.55 5.73 6.002H0l4.63 3.37-1.77 5.452 4.64-3.372 4.64 3.372-1.77-5.452L15 6.002zm-7.5 4.214l-2.74 1.99L5.807 8.99 3.073 7.002h3.382L7.5 3.787l1.044 3.215h3.382L9.196 8.99l1.043 3.216-2.74-1.99z"></path>--}}
{{--               </svg>--}}
{{--            </span>--}}
{{--            <span class="e2-toggle-state-on">--}}
{{--               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">--}}
{{--                  <path stroke="none" d="M4.63 9.372l-1.77 5.452 4.64-3.372 4.64 3.372-1.77-5.452L15 6.002H9.27L7.5.55 5.73 6.002H0l4.63 3.37z"></path>--}}
{{--               </svg>--}}
{{--            </span>--}}
{{--            <span class="e2-toggle-state-thinking">--}}
{{--               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">--}}
{{--                  <circle r="39" cx="50" cy="50" transform="rotate(-90 50 50)" stroke-width="6" fill="none" stroke-dasharray="245" stroke-dashoffset="61">--}}
{{--                     <animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="1333ms" begin="indefinite" repeatCount="1"></animateTransform>--}}
{{--                  </circle>--}}
{{--               </svg>--}}
{{--            </span>--}}
{{--         </span>--}}
{{--      </a>--}}
{{--   </span>--}}
   <span class="admin-icon">
      <a href="{{ route('blog.posts.edit', $post) }}" class="nu e2-admin-link">
         <span class="e2-svgi">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
               <path stroke="none" fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.5l-8 8L1 15l4.5-1.5 8-8-3-3zm-5.25 9.25l-1-1L4 10.5l6.75-6.75 1.5 1.5L5.5 12l-.25-.25z"></path>
               <path stroke="none" fill-rule="evenodd" clip-rule="evenodd" d="M13.999 2c-1.5-1.5-3 0-3 0l-1 1 3 3 1-1c.001 0 1.501-1.5 0-3zm-.749 2.25L13 4.5 11.5 3l.25-.25s.78-.719 1.499 0 .001 1.5.001 1.5z"></path>
            </svg>
            <span class="e2-unsaved-led" style="display: none"></span>
         </span>
      </a>
   </span>
</span>
@endguest
