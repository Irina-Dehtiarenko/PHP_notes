<div class="show">
    <?php $note = $params['note'] ?? null ?>

    <?php if ($note) : ?>
        <ul>
            <li>Tytuł: <?php echo $note['title'] ?></li>
            <li>Id: <?php echo (int) $note['id'] ?></li>
            <li>Opis: <?php echo $note['description'] ?></li>
            <li>Utworzono: <?php echo (int) $note['created'] ?></li>
        </ul>
        <a href="/notes"><button>Powrót do listy notatek</button></a>
        <a href="/notes/?action=edit&id=<?php echo $note['id'] ?>">
            <button>Edytuj</button>
        </a>
    <?php else : ?>
        <div>Brak notatki do wyświetlenia.</div>
    <?php endif; ?>
</div>