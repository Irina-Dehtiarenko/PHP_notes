<h3>
    Nowa notatka
</h3>

<!-- $_POST -->
<form class="note-form" action="/notes/?action=create" method="post">
    <ul>
        <li>
            <label>Tytuł <spann class="required">*</span></label>
            <input type="text" name="title" class="field-long" />
        </li>
        <li>
            <label>Treść</label>
            <textarea name="description" id="field5" class="field-long field-textarea"></textarea>
        </li>
        <li>
            <input type="submit" value="Submit" />
        </li>
    </ul>
</form>

<?php echo ($params['resultCreate'] ?? ""); ?>