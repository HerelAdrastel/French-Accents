# -*- coding: utf8 -*-

# Generate a file for each accent listed in the charaters and label array

characters = ["Â", "Ê", "Î", "Ô", "Û", "Ä", "Ë", "Ï", "Ö", "Ü", "À", "Ç", "É", "È", "œ", "Ù"]
labels = ["a_circumflex", "e_circumflex", "i_circumflex", "o_circumflex", "u_circumflex", "a_umlaut", "e_umlaut",
          "i_umlaut", "o_umlaut", "u_umlaut", "a_grave", "c_cedilla", "e_acute", "e_grave", "oe", "u_grave"]

if len(characters) != len(labels):
    raise Exception("Character and label size are different ! {} vs {}".format(len(characters), len(labels)))

for index, label in enumerate(labels):
    with open("buttons/{}.js".format(label), "w", encoding="utf-8") as file:
        file.write("(function() {"
                   "tinymce.PluginManager.add('aliel_" + label + "', function( editor, url ) {"
                   "editor.addButton( 'aliel_" + label + "', {"
                   "text: '" + characters[index] + "',"
                   "icon: false,"
                   "onclick: function() {"
                   "editor.insertContent('" + characters[index] + "');"
                   "}"
                   "});"
                   "});"
                   "})();")
