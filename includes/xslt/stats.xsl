<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : article.xsl
    Created on : April 16, 2015, 12:38 AM
    Author     : MinhHieu
    Description:
        Purpose of transformation follows.
-->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"   version="1.0">
    <xsl:param name="search_condition"></xsl:param>
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/dblp">

            <div id="rcorners2">
			<h3> Statistiques</h3>
               <ul>
					<li># Articles : <xsl:value-of select="count(article)"/></li>
					<li># Auteurs : <xsl:value-of select="count(descendant::author[not(preceding::author/. = .)])"/></li>
					<li># Editeurs : <xsl:value-of select="count(descendant::editor[not(preceding::editor/. = .)])"/></li>
					<li># Journaux : <xsl:value-of select="count(descendant::journal[not(preceding::journal/. = .)])"/></li>
			   </ul>
            </div>
    </xsl:template>
</xsl:stylesheet>
