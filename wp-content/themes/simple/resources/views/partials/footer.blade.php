<footer class="content-info page-footer" role="contentinfo">
  <div class="footer-content row flex space-between align-center">
    <div class="footer-left col m4 s12">
      @php dynamic_sidebar('footer-left') @endphp
    </div>
    <div class="footer-center col m4 s12">
      @php dynamic_sidebar('footer-center') @endphp
    </div>
    <div class="footer-right col m4 s12">
      @php dynamic_sidebar('footer-right') @endphp
    </div>
  </div>

  <div class="footer-copyright row flex space-between">
    <div class="footer-left col m4 s12">
      <p class="copyright">&copy; {!! current_time('Y') !!} {{ get_bloginfo('name', 'display') }}</p>
    </div>
    <div class="footer-center col m4 s12">
      <a href="/privacy-policy/">Privacy Policy</a>
    </div>
    <div class="footer-right col m4 s12">
      @include('partials.unity')
    </div>
  </div>

</footer>
