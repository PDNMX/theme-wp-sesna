(function () {
  var data = window.directorioData;
  if (!data || !data.length) return;

  var items = document.querySelectorAll('.dir-org__item');
  var ficha = document.getElementById('dir-ficha');
  var foto = document.getElementById('dir-foto');
  var placeholder = document.getElementById('dir-foto-placeholder');
  var nombre = document.getElementById('dir-nombre');
  var encargadoRow = document.getElementById('dir-encargado-row');
  var encargadoSep = document.getElementById('dir-encargado-sep');
  var encargado = document.getElementById('dir-encargado');
  var cargo = document.getElementById('dir-cargo');
  var email = document.getElementById('dir-email');

  function update(index) {
    var d = data[index];
    if (!d) return;

    items.forEach(function (el) {
      el.classList.remove('dir-org__item--active');
      el.setAttribute('aria-selected', 'false');
    });
    items[index].classList.add('dir-org__item--active');
    items[index].setAttribute('aria-selected', 'true');

    ficha.style.opacity = '0';
    setTimeout(function () {
      nombre.textContent = d.nombre_titular || '—';

      if (d.encargado) {
        encargado.textContent = d.encargado;
        encargadoRow.classList.remove('d-none');
        encargadoSep.classList.remove('d-none');
      } else {
        encargadoRow.classList.add('d-none');
        encargadoSep.classList.add('d-none');
      }

      cargo.textContent = d.cargo_titular || '—';
      email.textContent = d.email_titular || '—';
      email.href = d.email_titular ? 'mailto:' + d.email_titular : '#';

      if (d.foto_titular) {
        foto.src = d.foto_titular;
        foto.alt = d.nombre_titular;
        foto.classList.remove('d-none');
        if (placeholder) placeholder.classList.add('d-none');
      } else {
        foto.classList.add('d-none');
        if (placeholder) placeholder.classList.remove('d-none');
      }

      ficha.style.opacity = '1';
    }, 150);

    if (window.innerWidth < 992) {
      var fichaCard = ficha.closest('.dir-card');
      if (fichaCard) {
        fichaCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    }
  }

  items.forEach(function (item, i) {
    item.addEventListener('click', function () { update(i); });
    item.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        update(i);
      }
    });
  });
})();
