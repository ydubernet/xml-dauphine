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
		<h2 style="text-align:center;">Les articles</h2>
			<table width="100%" style="text-align:center;">
				<th>Auteur(s)</th>
				<th>Titre</th>
				<th>Page</th>
				<th>Volume</th>
				<th>Journal</th>
            <xsl:apply-templates select="article"/>
			</table>
			<br/> <br/>
			<form method="POST">
				<input type="hidden" name="MODE"  value="C"/>
				<table style="margin-left: auto; margin-right: auto;text-align:center;"><caption>Création d'un article</caption>
					<tr>
						<td>Titre :</td>
						<td><input type="text" name="title"/></td>
					</tr>
					<tr>
						<td>Pages :</td>
						<td><input type="text" name="pages"/></td>
					</tr>
					<tr>
						<td>Volume :</td>
						<td><input type="text" name="volume"/></td>
					</tr>
					<tr>
						<td>Journal :</td>
						<td><input type="text" name="journal"/></td>
					</tr>
					<tr>
						<td>Number :</td>
						<td><input type="text" name="number"/></td>
					</tr>
					<tr>
						<td>Url :</td>
						<td><input type="text" name="url"/></td>
					</tr>
					
					<tr>
						<td colspan="2"><input type="submit" value="Ajouter"/></td>
					</tr>
				</table>
			</form>
			
	</body>
	</html>
    </xsl:template>
	
	<xsl:template match="article">
		<tr>
			<td style="width:20%;">
				<ul>
					<xsl:for-each select="author">
					<li>
						<xsl:value-of select="."/>
					</li>
					</xsl:for-each>
				</ul>
			</td>
			<form method="POST">
				<input type="hidden" name="REF" >
					<xsl:attribute name="value">
						<xsl:value-of select="@key"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="MODE"  value="M"/>
				<td>
					<input style="width:100%;" type="text" name="title">
						<xsl:attribute name="value">
							<xsl:value-of select="title"/>
						</xsl:attribute>
					</input>
				</td>
				<td style="width:6%;">   
					<input style="width:100%;" type="text" name="pages">
						<xsl:attribute name="value">
							<xsl:value-of select="pages"/>
						</xsl:attribute>
					</input>
				</td>
				<td style="width:4%;">   
					<input style="width:100%;" type="text" name="volume">
						<xsl:attribute name="value">
							<xsl:value-of select="volume"/>
						</xsl:attribute>
					</input>
				</td>
				<td style="width:15%;">
					<input style="width:100%;" type="text" name="journal">
						<xsl:attribute name="value">
							<xsl:value-of select="journal"/>
						</xsl:attribute>
					</input>
				</td>
				<!--<td>
					<xsl:value-of select="number"/>
				</td>
				<td>
					<a>
						<xsl:value-of select="url"/>
					</a>
				</td>-->
				<td style="width:5%;">
					<input type="submit" value="Modifier"/>
				</td>
			</form>
			<td style="width:5%;">
			<form method="POST">
				<input type="hidden" name="REF" >
					<xsl:attribute name="value">
						<xsl:value-of select="@key"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="MODE"  value="S"/>
				<input type="submit" value="Supprimer"/>
			</form>
			</td>
		</tr>
	</xsl:template>

</xsl:stylesheet>
