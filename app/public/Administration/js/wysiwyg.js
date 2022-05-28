// EDITEUR DE TEXTE WYSIWYG TINY MCE

tinymce.init(
    {
        selector: '#content',
        language: 'fr_FR',
        spellchecker_language: 'fr_FR',
        width: "100%",
        plugins: 'image autolink lists media table',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
      });