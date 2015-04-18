<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : article.xsl
    Created on : April 16, 2015, 12:38 AM
    Author     : MinhHieu
    Description:
        Purpose of transformation follows.
-->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:param name="author"/>
	<xsl:param name="title"/>
    <xsl:output method="html"/>

	
	
    <xsl:template match="/dblp">
		<h2 style="text-align:center;">Les articles</h2>
			<table width="100%" style="text-align:center;">
				<th>Auteur(s)</th>
				<th>Titre</th>
				<th>Pages</th>
				<th>Volume</th>
				<th>Journal</th>
				<th>Année</th>
				<th>Lien</th>
            <xsl:apply-templates select="article[contains(title,$title)][contains(author,$author)]"/>
			</table>
			
    </xsl:template>
	

	
	<xsl:template match="article">
		<tr>
			<td style="width:20%;">
					<xsl:for-each select="author">
						<xsl:if test="position()>1">
							<br/>
						</xsl:if>
						<xsl:value-of select="."/>
					</xsl:for-each>

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
				<td style="width:3%;">
					<xsl:value-of select="year"/>
				</td>
				<td style="width:3%;">
					<a target="_blank">
						<xsl:attribute name="href">
							<xsl:value-of select="ee"/>
						</xsl:attribute>
						lien
					</a>
				</td>
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
