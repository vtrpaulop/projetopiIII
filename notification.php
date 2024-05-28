<?php if (\Core\Notification::get()): ?>
    <div class="c-notification c-<?= \Core\Notification::getStatus() ?>">
        <div class="c-notification__info">
            <p class="c-notification__message"><?= \Core\Notification::getMessage() ?></p>
            <button class="c-notification__exit">
                <i class="fa-solid fa-xmark c-<?= \Core\Notification::getStatus() ?>__icon"></i>
            </button>
        </div>
    </div>
<?php endif; ?>