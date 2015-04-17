<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : article.xsl
    Created on : April 16, 2015, 12:38 AM
    Author     : MinhHieu
    Description:
        Purpose of transformation follows.
-->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:param name="search_condition"/>
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->


    <xsl:template match="/dblp">
		<html>
		<body>
        <form>
		<h2 style="text-align:center;">Les articles</h2>
			<table width="100%" style="text-align:center;">
				<th>Auteur(s)</th>
				<th>Titre</th>
				<th>Page</th>
				<th>Volume</th>
				<th>Journal</th>
            <xsl:apply-templates select="article"/>
			</table>
        </form> 
			
	</body>
	</html>
    </xsl:template>
	
	<xsl:template match="article">
		<tr>
			<td>
				<ul>
					<xsl:for-each select="author">
					<li>
						<xsl:value-of select="."/>
					</li>
					</xsl:for-each>
				</ul>
			</td>
			<td>
				<xsl:value-of select="title"/>
			</td>
			<td>   
				<xsl:value-of select="pages"/>
			</td>
			<td>   
				<xsl:value-of select="volume"/>
			</td>
			<td>
				<xsl:value-of select="journal"/>
			</td>
			<!--<td>
				<xsl:value-of select="number"/>
			</td>
			<td>
				<a>
					<xsl:value-of select="url"/>
				</a>
			</td>-->
			<td>
			<button type="submit">Supprimer</button>
			</td>
		</tr>
	</xsl:template>

</xsl:stylesheet>
