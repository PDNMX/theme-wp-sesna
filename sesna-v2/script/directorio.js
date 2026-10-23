(function () {
  var data = window.directorioData;
  if (!data || !data.length) return;

  var items = Array.prototype.slice.call(document.querySelectorAll('.dir-org__item'));

  // Desktop elements
  var ficha = document.getElementById('dir-ficha');
  var foto = document.getElementById('dir-foto');
  var placeholder = document.getElementById('dir-foto-placeholder');
  var areaBadge = document.getElementById('dir-area-badge');
  var nombre = document.getElementById('dir-nombre');
  var encargadoRow = document.getElementById('dir-encargado-row');
  var encargadoSep = document.getElementById('dir-encargado-sep');
  var encargado = document.getElementById('dir-encargado');
  var cargo = document.getElementById('dir-cargo');
  var email = document.getElementById('dir-email');
  var emailBtn = document.getElementById('dir-email-btn');

  // Modal elements
  var modal = document.getElementById('dir-modal');
  var modalBackdrop = document.getElementById('dir-modal-backdrop');
  var modalClose = document.getElementById('dir-modal-close');
  var modalFoto = document.getElementById('dir-modal-foto');
  var modalPlaceholder = document.getElementById('dir-modal-placeholder');
  var modalAreaBadge = document.getElementById('dir-modal-area-badge');
  var modalNombre = document.getElementById('dir-modal-nombre');
  var modalEncargadoRow = document.getElementById('dir-modal-encargado-row');
  var modalEncargadoSep = document.getElementById('dir-modal-encargado-sep');
  var modalEncargado = document.getElementById('dir-modal-encargado');
  var modalCargo = document.getElementById('dir-modal-cargo');
  var modalEmail = document.getElementById('dir-modal-email');

  function isMobile() {
    return window.innerWidth <= 1023;
  }

  function fillFicha(d) {
    if (areaBadge) areaBadge.textContent = d.estructura || '';

    nombre.textContent = d.nombre_titular || '—';

    if (d.encargado) {
      encargado.textContent = d.encargado;
      encargadoRow.classList.remove('muestra--ninguno');
      encargadoSep.classList.remove('muestra--ninguno');
    } else {
      encargadoRow.classList.add('muestra--ninguno');
      encargadoSep.classList.add('muestra--ninguno');
    }

    cargo.textContent = d.cargo_titular || '—';
    email.textContent = d.email_titular || '—';
    email.href = d.email_titular ? 'mailto:' + d.email_titular : '#';

    if (emailBtn) {
      emailBtn.href = d.email_titular ? 'mailto:' + d.email_titular : '#';
    }

    if (d.foto_titular) {
      foto.src = d.foto_titular;
      foto.alt = d.nombre_titular;
      foto.classList.remove('muestra--ninguno');
      if (placeholder) placeholder.classList.add('muestra--ninguno');
    } else {
      foto.classList.add('muestra--ninguno');
      if (placeholder) placeholder.classList.remove('muestra--ninguno');
    }
  }

  function openModal(d) {
    if (modalAreaBadge) modalAreaBadge.textContent = d.estructura || '';
    modalNombre.textContent = d.nombre_titular || '—';

    if (d.encargado) {
      modalEncargado.textContent = d.encargado;
      modalEncargadoRow.classList.remove('muestra--ninguno');
      modalEncargadoSep.classList.remove('muestra--ninguno');
    } else {
      modalEncargadoRow.classList.add('muestra--ninguno');
      modalEncargadoSep.classList.add('muestra--ninguno');
    }

    modalCargo.textContent = d.cargo_titular || '—';
    modalEmail.textContent = d.email_titular || '—';
    modalEmail.href = d.email_titular ? 'mailto:' + d.email_titular : '#';

    if (d.foto_titular) {
      modalFoto.src = d.foto_titular;
      modalFoto.alt = d.nombre_titular;
      modalFoto.classList.remove('muestra--ninguno');
      modalPlaceholder.classList.add('muestra--ninguno');
    } else {
      modalFoto.classList.add('muestra--ninguno');
      modalPlaceholder.classList.remove('muestra--ninguno');
    }

    modal.classList.add('dir-modal--open');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    if (modalClose) modalClose.focus();
  }

  function closeModal() {
    modal.classList.remove('dir-modal--open');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  function update(index, shouldFocus) {
    var d = data[index];
    if (!d) return;

    items.forEach(function (el, idx) {
      var active = idx === index;
      el.classList.toggle('dir-org__item--active', active);
      el.setAttribute('aria-selected', active ? 'true' : 'false');
      el.setAttribute('tabindex', active ? '0' : '-1');
    });

    if (shouldFocus && items[index]) {
      items[index].focus();
    }

    if (isMobile()) {
      fillFicha(d);
      openModal(d);
    } else {
      ficha.style.opacity = '0';
      setTimeout(function () {
        fillFicha(d);
        ficha.style.opacity = '1';
      }, 150);
    }
  }

  // Modal close events
  if (modalClose) modalClose.addEventListener('click', closeModal);
  if (modalBackdrop) modalBackdrop.addEventListener('click', closeModal);
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && modal && modal.classList.contains('dir-modal--open')) {
      closeModal();
    }
  });

  // Mailto open in new window
  [email, emailBtn, modalEmail].forEach(function (el) {
    if (!el) return;
    el.addEventListener('click', function (e) {
      if (this.href && this.href.indexOf('mailto:') === 0) {
        e.preventDefault();
        window.open(this.href, '_blank', 'noopener');
      }
    });
  });

  // Item click and WAI-ARIA listbox keyboard events (Enter, Space, ArrowDown, ArrowUp, Home, End)
  items.forEach(function (item, i) {
    item.addEventListener('click', function () { update(i, false); });
    item.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        update(i, false);
      } else if (e.key === 'ArrowDown') {
        e.preventDefault();
        var next = (i + 1) % items.length;
        update(next, true);
      } else if (e.key === 'ArrowUp') {
        e.preventDefault();
        var prev = (i - 1 + items.length) % items.length;
        update(prev, true);
      } else if (e.key === 'Home') {
        e.preventDefault();
        update(0, true);
      } else if (e.key === 'End') {
        e.preventDefault();
        update(items.length - 1, true);
      }
    });
  });
})();
