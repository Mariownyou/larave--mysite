<div style="display: inline-block; position: relative; vertical-align: middle; top: 15px;">
    <form id="e2-search" class="search-field search-field-right-anchored e2-enterable"
          action="{{ route('search') }}" method="get" accept-charset="utf-8">
        <label class="search-field__label">
            <input class="search-field__input" type="search" inputmode="search" name="query" id="query" value="">

            <span class="search-field__zoom-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                    <path stroke="none" fill-rule="evenodd" clip-rule="evenodd"
                          d="M16 14.5l-4.399-4.399a6.212 6.212 0 001.148-3.602 6.25 6.25 0 10-12.5 0 6.25 6.25 0 006.251 6.25 6.212 6.212 0 003.602-1.148L14.5 16l1.5-1.5zM1.25 6.501a5.251 5.251 0 1110.502 0 5.251 5.251 0 01-10.502 0z">
                    </path>
                </svg></span>

            <a class="nu search-field__tags-icon" href="{{ route('blog.tags.index') }}" title="Теги">
                <span class="e2-svgi"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                        <path stroke="none"
                              d="M6.938 16.001c-.43 0-.891-.16-1.32-.59L.607 10.38C-.406 9.367.037 8.191.581 7.647l6.538-6.501C7.145 1.116 8.176 0 9.427 0h4.044c1.153 0 2.5.659 2.5 2.516v3.991c0 1.167-1.029 2.229-1.146 2.347L8.32 15.415c-.308.309-.818.586-1.382.586zM9.427 1c-.801 0-1.578.828-1.586.837L1.287 8.354c-.146.152-.587.706.027 1.319l5.011 5.031c.589.59 1.137.15 1.29.003l6.501-6.559c.238-.241.855-1.002.855-1.642v-3.99c0-1.318-.94-1.516-1.5-1.516H9.427zm1.571 5.754c-.468 0-.907-.183-1.238-.515a1.765 1.765 0 010-2.487c.661-.664 1.814-.664 2.475 0 .331.332.513.774.513 1.243 0 .469-.182.911-.513 1.243a1.73 1.73 0 01-1.237.516z">
                        </path>
                    </svg></span>
            </a>
        </label>

    </form>
</div>

<div class="menu-items">
    <a class="menu-language" href="https://ilyabirman.net/meanwhile/">
        <div class="menu-link">en</div>
    </a>
    <a class="menu-language">
        <div class="menu-link">ру</div>
    </a>
    <div class="menu-language-separator"></div>
</div>
