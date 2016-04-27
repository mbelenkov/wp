<aside id="sidebar" class="cf">
  <section id="meta" class="widget">
    <h3 class="widget-title"> Meta </h3>
    <ul>
      <?php wp_register(); ?>
      <li><?php wp_loginout(); ?></li>
      <?php if(!is_user_logged_in()): ?>
        <li><?php wp_login_form(); ?></li>
      <?php endif; ?>
    </ul>
  </section>
</aside>