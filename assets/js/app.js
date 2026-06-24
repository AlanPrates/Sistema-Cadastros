(function () {
  function buildModal() {
    var backdrop = document.createElement('div');
    backdrop.className = 'app-modal-backdrop';
    backdrop.innerHTML = [
      '<div class="app-modal" role="dialog" aria-modal="true" aria-labelledby="appModalTitle">',
      '  <div class="app-modal-header">',
      '    <h2 class="app-modal-title" id="appModalTitle"></h2>',
      '    <button class="app-modal-close" type="button" aria-label="Fechar">x</button>',
      '  </div>',
      '  <div class="app-modal-body"></div>',
      '  <div class="app-modal-footer">',
      '    <button class="btn-modern btn-secondary-modern app-modal-cancel" type="button">Cancelar</button>',
      '    <button class="btn-modern btn-primary-modern app-modal-confirm" type="button">Continuar</button>',
      '  </div>',
      '</div>'
    ].join('');
    document.body.appendChild(backdrop);
    return backdrop;
  }

  var modal = null;
  var pendingAction = null;

  function getModal() {
    if (!modal) {
      modal = buildModal();
      modal.querySelector('.app-modal-close').addEventListener('click', closeModal);
      modal.querySelector('.app-modal-cancel').addEventListener('click', closeModal);
      modal.addEventListener('click', function (event) {
        if (event.target === modal) {
          closeModal();
        }
      });
      modal.querySelector('.app-modal-confirm').addEventListener('click', function () {
        var action = pendingAction;
        closeModal();
        if (typeof action === 'function') {
          action();
        }
      });
    }
    return modal;
  }

  function openModal(options, action) {
    var current = getModal();
    pendingAction = action;
    current.querySelector('.app-modal-title').textContent = options.title || 'Confirmar acao';
    current.querySelector('.app-modal-body').textContent = options.message || 'Deseja continuar?';
    current.querySelector('.app-modal-confirm').textContent = options.confirm || 'Continuar';
    current.querySelector('.app-modal-cancel').textContent = options.cancel || 'Cancelar';
    current.classList.add('is-open');
    current.querySelector('.app-modal-confirm').focus();
  }

  function closeModal() {
    if (modal) {
      modal.classList.remove('is-open');
    }
    pendingAction = null;
  }

  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
      closeModal();
    }
  });

  document.addEventListener('click', function (event) {
    var trigger = event.target.closest('[data-modal-title]');
    if (!trigger) {
      return;
    }

    var form = trigger.closest('form');
    var isSubmit = trigger.matches('button[type="submit"], input[type="submit"]');

    if (isSubmit && form && !form.reportValidity()) {
      return;
    }

    event.preventDefault();

    openModal({
      title: trigger.getAttribute('data-modal-title'),
      message: trigger.getAttribute('data-modal-message'),
      confirm: trigger.getAttribute('data-modal-confirm'),
      cancel: trigger.getAttribute('data-modal-cancel')
    }, function () {
      if (isSubmit && form) {
        form.submit();
        return;
      }

      var href = trigger.getAttribute('href');
      if (href) {
        window.location.href = href;
      }
    });
  });
}());
