@guest()
@else
<input type="hidden" value="{{ $post->id }}" id="post_id">
<span class="admin-links admin-links-floating admin-links-sticky">
     <span class="admin-icon">
        <a id="submit" href="{{ route('blog.'.$method.'.destroy', $obj) }}" class="nu e2-admin-link">
           <span class="e2-svgi">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                 <path stroke="none" fill-rule="evenodd" clip-rule="evenodd" d="M3 3v10s0 1 1 1h8c1 0 1-1 1-1V3H3zm3 10H4V4h2v9zm3 0H7V4h2v9zm3 0h-2V4h2v9z"></path>
                 <path d="M10 3V2H6v1H2v1h12V3z"></path>
              </svg>
           </span>
        </a>
     </span>
</span>
@endguest

@push('scripts')
    <script>
        $(document).ready(function(){
            $('#submit').on('click', function(e){
                e.preventDefault();
                console.log($('#post_id').val())

                $.ajax({
                    type: 'POST',
                    url: '/delete',
                    data: {
                        id: $('#post_id').val(),
                    },
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result){
                        console.log(result);
                        redirect(1);
                    }
                });
            });
        });

        function redirect(url) {
            window.location.replace("http://localhost:8000/posts");
            //document.location.href='http://stackoverflow.com'
        }
    </script>
@endpush
