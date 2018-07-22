# -*- coding: utf8 -*-

# Generate a file for each accent listed in the charaters and label array
# This script is used only for devlopment

characters = ["À", "Ç", "É", "È", "œ", "Ù"]
labels = ["a_grave", "c_cedilla", "e_acute", "e_grave", "oe", "u_grave"]

if len(characters) != len(labels):
    raise Exception("Character and label size are different ! {} vs {}".format(len(characters), len(labels)))

for index, label in enumerate(labels):
    with open("buttons/{}.js".format(label), "w", encoding="utf-8") as file:
        file.write("(function() {"
                   "tinymce.PluginManager.add('french_accents_" + label + "', function( editor, url ) {"
                   "editor.addButton( 'french_accents_" + label + "', {"
                   "text: '" + characters[index] + "',"
                   "icon: false,"
                   "onclick: function() {"
                   "editor.insertContent('" + characters[index] + "');"
                   "}"
                   "});"
                   "});"
                   "})();")
