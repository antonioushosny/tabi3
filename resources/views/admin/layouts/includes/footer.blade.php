
<footer class="app-footer">
  <div>
    &copy;
    <a
      href="https://www.applife.com/"
      target="_blank"
      rel="noopener noreferrer"
      className="mx-2"
    >
      <span style="font-size: 12px; letter-spacing: -1px" >
        {{ __('lang.applife') }}
      </span>
      <img
        src={{ asset($locale == 'ar' ? 'images/logo.png' : 'images/logo.png') }}
        alt="tabe3"
        className="img-fluid mx-3 brand-img"
        style="width: 45px"
      />
    </a>
  </div>
</footer>