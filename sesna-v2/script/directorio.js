(function () {
  var data = window.directorioData;
  if (!data || !data.length) return;

  var items = document.querySelectorAll('.dir-org__item');

  // Desktop elements
  var ficha = document.getElementById('dir-ficha');
  var foto = document.getElementById('dir-foto');
  var placeholder = document.getElementById('dir-foto-placeholder');
  var nombre = document.getElementById('dir-nombre');
  var encargadoRow = document.getElementById('dir-encargado-row');
  var encargadoSep = document.getElementById('dir-encargado-sep');
  var encargado = document.getElementById('dir-encargado');
  var cargo = document.getElementById('dir-cargo');
  var email = document.getElementById('dir-email');

  // Modal elements
  var modal = document.getElementById('dir-modal');
  var modalBackdrop = document.getElementById('dir-modal-backdrop');
  var modalClose = document.getElementById('dir-modal-close');
  var modalFoto = document.getElementById('dir-modal-foto');
  var modalPlaceholder = document.getElementById('dir-modal-placeholder');
  var modalNombre = document.getElementById('dir-modal-nombre');
  var modalEncargadoRow = document.getElementById('dir-modal-encargado-row');
  var modalEncargadoSep = document.getElementById('dir-modal-encargado-sep');
  var modalEncargado = document.getElementById('dir-modal-encargado');
  var modalCargo = document.getElementById('dir-modal-cargo');
  var modalEmail = document.getElementById('dir-modal-email');

  function isMobile() {
    return window.innerWidth <= 767;
  }

  function fillFicha(d) {
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
  }

  function openModal(d) {
    modalNombre.textContent = d.nombre_titular || '—';

    if (d.encargado) {
      modalEncargado.textContent = d.encargado;
      modalEncargadoRow.classList.remove('d-none');
      modalEncargadoSep.classList.remove('d-none');
    } else {
      modalEncargadoRow.classList.add('d-none');
      modalEncargadoSep.classList.add('d-none');
    }

    modalCargo.textContent = d.cargo_titular || '—';
    modalEmail.textContent = d.email_titular || '—';
    modalEmail.href = d.email_titular ? 'mailto:' + d.email_titular : '#';

    if (d.foto_titular) {
      modalFoto.src = d.foto_titular;
      modalFoto.alt = d.nombre_titular;
      modalFoto.classList.remove('d-none');
      modalPlaceholder.classList.add('d-none');
    } else {
      modalFoto.classList.add('d-none');
      modalPlaceholder.classList.remove('d-none');
    }

    modal.classList.add('dir-modal--open');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    modal.classList.remove('dir-modal--open');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  function update(index) {
    var d = data[index];
    if (!d) return;

    items.forEach(function (el) {
      el.classList.remove('dir-org__item--active');
      el.setAttribute('aria-selected', 'false');
    });
    items[index].classList.add('dir-org__item--active');
    items[index].setAttribute('aria-selected', 'true');

    if (isMobile()) {
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
  modalClose.addEventListener('click', closeModal);
  modalBackdrop.addEventListener('click', closeModal);
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && modal.classList.contains('dir-modal--open')) {
      closeModal();
    }
  });

  // Mailto open in new window
  [email, modalEmail].forEach(function (el) {
    el.addEventListener('click', function (e) {
      if (this.href && this.href.indexOf('mailto:') === 0) {
        e.preventDefault();
        window.open(this.href, '_blank', 'noopener');
      }
    });
  });

  // Item click/keyboard events
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
