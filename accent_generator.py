# -*- coding: utf8 -*-

# Generate a file for each accent listed in the charaters and label array

characters = ["Ê", "À", "Ç", "É", "È", "œ", "Ù"]
labels = ["e_circumflex", "a_grave", "c_cedilla", "e_acute", "e_grave", "oe", "u_grave"]

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
