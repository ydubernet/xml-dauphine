<?xml version="1.0" encoding="UTF-8"?>


<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"   version="1.0">
    <xsl:param name="search_condition"></xsl:param>
    <xsl:output method="html"/>

    <xsl:template match="/dblp">

            <div id="rcorners2">
			<h3> Statistiques</h3>
               <ul>
			   <!-- Problème de perf lors de l'utilisation de l'axe preceding sur les auteurs pour faire le distinct--> 
					<li># Articles : <xsl:value-of select="count(article)"/></li>
					<li># Auteurs : <xsl:value-of select="count(descendant::author)"/></li>
					<!--<li># Auteurs : <xsl:value-of select="count(descendant::author[not(preceding::author/. = .)])"/></li>-->
					<!--<li># Editeurs : <xsl:value-of select="count(descendant::editor)"/></li>-->
					<li># Editeurs : <xsl:value-of select="count(descendant::editor[not(preceding::editor/. = .)])"/></li>
					<!--<li># Journaux : <xsl:value-of select="count(descendant::journal)"/></li>>-->
					<li># Journaux : <xsl:value-of select="count(descendant::journal[not(preceding::journal/. = .)])"/></li>
			   </ul>
            </div>
    </xsl:template>
</xsl:stylesheet>
