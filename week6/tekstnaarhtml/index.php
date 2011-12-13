<?php
# include de benodigde bestanden (require geeft een fatale fout als het niet lukt)
require('../inc/config.inc.php');
require('../inc/functions.inc.php');
require('../inc/template.inc.php');

# geef de HTML code voor het openen van de pagina weer
htmlOpenen('Upload formulier');

$langeTekst = '
Replacing Truth - Kevin Scharp (The Ohio State University)

Although the concept of truth has a venerable history, it also has a dark side that has been known
for millennia: it gives rise to nasty paradoxes, the most famous of which is the liar paradox.1 Despite
the fact that these paradoxes do not surface much in everyday conversations, they pose a serious
threat to us. We have discovered that they inhibit our ability to explain our own rational behavior,
and the problem is so acute that researchers who study language, reasoning, and thought avoid truth
like the plague. The simple fact that we possess this concept has become an impediment to our
attempts to understand ourselves. In this work, I argue that these paradoxes are symptoms of an
intrinsic defect in the concept of truth; for this reason we should replace truth for certain purposes.

Truth has had its detractors over the years. From Protagoras to Richard Rorty, thinkers have
tried to downplay its importance or eliminate it altogether. My views and the reasons for them are
wholly distinct from theirs. The case against truth contained in these pages has nothing to do with
relativism or postmodernism. Rather, it is because of truth’s utility, value, and importance that it
needs to be replaced. If it were just an antiquated ideal that enlightened agents should discard, then
there would be no point in replacing it. It is an unfortunate fact that its utility, value, and
importance come at a high price.

The problems caused by truth are severe, but they are not unprecedented. Once we understand
that the source of the paradoxes is a conceptual defect, we can do what we have always done in
these situations—replace the offender with one or more concepts, at least for certain purposes, that
are free of defects. I offer a team of concepts that, together, can do truth’s job without the cost of
paradoxes. In addition, they can be used in an explanation of our defective concept of truth itself,
thus freeing us from our predicament.

I want it to be clear, right from the start, that I do not advocate eliminating truth from our
conceptual repertoire. I am not trying to persuade people to stop using the word ‘true’. There is no
need for flyers or public service announcements. For most purposes, the risk posed by our concept
of truth is negligible; so it is reasonable to use truth, despite its defect, in most situations. Only
those engaged in trying to explain our thought or language will so much as notice the change.
Although this revolution will be relatively quiet, it should have a significant impact on the way we
think about ourselves at the most fundamental level.';

echo text_to_html($langeTekst, false);

# geef de HTML code voor het sluiten van de pagina weer
htmlSluiten();
?>