<footer class="content-info page-footer" role="contentinfo">
  <div class="container">
    @php dynamic_sidebar('sidebar-footer') @endphp
  </div>
  <div class="footer-copyright">
    <div class="container">
      <div class="flex flex-center space-between">
        <p class="copyright">&copy; {!! current_time('Y') !!} {{ get_bloginfo('name', 'display') }} &nbsp;|&nbsp; <a href="/privacy-policy/">Privacy Policy</a></p>
        @include('partials.unity')
      </div>
    </div>
  </div>
</footer>
