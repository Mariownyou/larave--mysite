<footer id="footer" class="footer emerge" data-continue="true">


    <div class="b-generic-container">

        <div id="social" class="emerge"
             data-effect="slide"
             data-up="256px"
             data-continue="true"
        >
            <div class="menu-line menu-line-submenu menu-line-multiline">
                <div class="menu-items">
                    <a href="https://github.com/Mariownyou" class="menu-item a-twitter"><div class="menu-link">Гитхаб</div></a>
                    <a href="http://twitter.com/mariownyou/" class="menu-item a-twitter"><div class="menu-link">Твиттер</div></a>
                    <a href="https://telegram.me/mariownyou" class="menu-item a-telegram"><div class="menu-link">Телеграм</div></a>
                    <a href="http://vk.com/ilyabirman" class="menu-item a-vk"><div class="menu-link caps">ВК</div></a>
                    <a href="http://instagram.com/_yalevushka/" class="menu-item a-instagram"><div class="menu-link">Инстаграм</div></a>

                    <div class="menu-item menu-space">• </div>

                    <a href="//ilyabirman.ru/said/" class="menu-item"><div class="menu-link">Фразы</div></a>
                    <a href="meanwhile/all/" class="menu-item"><div class="menu-link">Все заметки в блоге</div></a>
                </div>
            </div>
        </div>

    </div>


    <div class="footer-copyright">
        <p>© 2020<span class="ellipsis">...</span>2021</p>
    </div>

    <div class="footer-email">
        <p><a href="mailto:mariownyou@gmail.com">mariownyou@gmail.com</a></p>
    </div>

    @guest
        <a class="margins e2-visual-login nu" id="e2-visual-login" href="{{ route('login') }}" style="opacity: 0.25;"><span class="e2-admin-link e2-svgi"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path fill-rule="evenodd" stroke="none" clip-rule="evenodd" d="M11 6h-1V4a4 4 0 0 0-8 0v2H1C0 6 0 7 0 7v7.999C0 15.998 1 16 1 16h10s1 0 1-1V7s0-1-1-1zM8 6H4V4a2 2 0 0 1 4 0v2z"></path></svg></span></a>
    @else
        <a class="margins e2-visual-login nu" id="e2-visual-logout" href="#" style="opacity: 0.25;">
            <span class="e2-admin-link e2-svgi">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" stroke="none" clip-rule="evenodd"  d="M10 6H11C12 6 12 7 12 7V15C12 16 11 16 11 16H1C1 16 0 15.998 0 14.999V7C0 7 0 6 1 6H2H4H8V4C8 3.46957 7.78929 2.96086 7.41421 2.58579C7.03914 2.21071 6.53043 2 6 2C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4H2C2 2.93913 2.42143 1.92172 3.17157 1.17157C3.92172 0.421427 4.93913 0 6 0C7.06087 0 8.07828 0.421427 8.82843 1.17157C9.57857 1.92172 10 2.93913 10 4V6Z" fill="black"/>
                </svg>
            </span>
        </a>
    @endguest

</footer>

@push('scripts')
    <script>
        $('#e2-visual-logout').on('click', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route('logout') }}',
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (result) {
                    console.log(result);
                    redirect(1);
                }
            });
        });

        function redirect(url) {
            window.location.replace("{{ route('home') }}");
        }
    </script>
@endpush
