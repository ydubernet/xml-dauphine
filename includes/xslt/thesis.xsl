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
	<xsl:param name="year"/>
	<xsl:param name="school"/>
	<xsl:param name="order"/>
	<xsl:param name="order_type"/>
	<xsl:param name="begin"/>
	<xsl:param name="end"/>
    <xsl:output method="html"/>

	
	
    <xsl:template match="/dblp">
		<h2 style="text-align:center;">Les Thèses</h2>
			<table width="100%" style="text-align:center;">
				<th>Auteur</th>
				<th>Titre</th>
				<th>Ecole</th>
				<th>Année</th>
				<th>ISBN</th>
				<th>Pages</th>
				<th>Lien</th>
            <xsl:apply-templates select="phdthesis[contains(title,$title)][contains(year,$year)][contains(author,$author)][contains(school,$school)]|mastersthesis[contains(title,$title)][contains(year,$year)][contains(author,$author)][contains(school,$school)]">
				<xsl:sort select="*[name()=$order]" data-type="text" order="{$order_type}" />
			</xsl:apply-templates>
			</table>
    </xsl:template>
	

	
	<xsl:template match="phdthesis|mastersthesis">
		<xsl:if test="position() = ($begin + 1) ">
			<xsl:if test="$begin &gt; 0">
				<form method="POST">
					<input type="hidden" name="pp_BEGIN" >
					<xsl:attribute name="value">
							<xsl:value-of select="($begin - ($end - $begin))"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pp_AUTHOR" >
					<xsl:attribute name="value">
							<xsl:value-of select="$author"/>
						</xsl:attribute>
					</input>
					
					<input type="hidden" name="pp_TITLE" >
					<xsl:attribute name="value">
							<xsl:value-of select="$title"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pp_YEAR" >
					<xsl:attribute name="value">
							<xsl:value-of select="$year"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pp_SCHOOL" >
					<xsl:attribute name="value">
							<xsl:value-of select="$school"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pp_ORDER_TYPE" >
					<xsl:attribute name="value">
							<xsl:value-of select="$order_type"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pp_ORDER" >
					<xsl:attribute name="value">
							<xsl:value-of select="$order"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pp_SIZE" >
					<xsl:attribute name="value">
							<xsl:value-of select="$end - $begin"/>
						</xsl:attribute>
					</input>
					<input type="submit" value="Précédent"/>
				</form>
			</xsl:if>
			<xsl:if test="last() &gt; $end">
				<form method="POST">
					<input type="hidden" name="pp_AUTHOR" >
					<xsl:attribute name="value">
							<xsl:value-of select="$author"/>
						</xsl:attribute>
					</input>
					
					<input type="hidden" name="pp_TITLE" >
					<xsl:attribute name="value">
							<xsl:value-of select="$title"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pp_YEAR" >
					<xsl:attribute name="value">
							<xsl:value-of select="$year"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pp_SCHOOL" >
					<xsl:attribute name="value">
							<xsl:value-of select="$school"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pp_ORDER_TYPE" >
					<xsl:attribute name="value">
							<xsl:value-of select="$order_type"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pp_ORDER" >
					<xsl:attribute name="value">
							<xsl:value-of select="$order"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pp_SIZE" >
					<xsl:attribute name="value">
							<xsl:value-of select="$end - $begin"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pp_BEGIN" >
					<xsl:attribute name="value">
							<xsl:value-of select="$end"/>
						</xsl:attribute>
					</input>
					<input type="submit" value="Suivant"/>
				</form>				
			</xsl:if>	
		</xsl:if>
	
	

		<xsl:if test="position()&gt; $begin and position()&lt; ($end+1)">
		<tr>
			
			<form method="POST">
				<input type="hidden" name="pp_AUTHOR" >
				<xsl:attribute name="value">
						<xsl:value-of select="$author"/>
					</xsl:attribute>
				</input>
				
				<input type="hidden" name="pp_TITLE" >
				<xsl:attribute name="value">
						<xsl:value-of select="$title"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pp_YEAR" >
				<xsl:attribute name="value">
						<xsl:value-of select="$year"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pp_SCHOOL" >
					<xsl:attribute name="value">
						<xsl:value-of select="$school"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pp_ORDER_TYPE" >
				<xsl:attribute name="value">
						<xsl:value-of select="$order_type"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pp_ORDER" >
				<xsl:attribute name="value">
						<xsl:value-of select="$order"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pp_SIZE" >
				<xsl:attribute name="value">
						<xsl:value-of select="$end - $begin"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pp_BEGIN" >
				<xsl:attribute name="value">
						<xsl:value-of select="$begin"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="REF" >
					<xsl:attribute name="value">
						<xsl:value-of select="@key"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="MODE"  value="M"/>
				<td style="width:10%;">
					<input style="width:100%;" type="text" name="author">
						<xsl:attribute name="value">
							<xsl:value-of select="author"/>
						</xsl:attribute>
					</input>
				</td>
				<td>
					<input style="width:100%;" type="text" name="title">
						<xsl:attribute name="value">
							<xsl:value-of select="title"/>
						</xsl:attribute>
					</input>
				</td>
				<td style="width:15%;">   
					<input style="width:100%;" type="text" name="school">
						<xsl:attribute name="value">
							<xsl:value-of select="school"/>
						</xsl:attribute>
					</input>
				</td>
				<td style="width:3%;">   
					<xsl:value-of select="year"/>
				</td>
				<td style="width:15%;">
					<input style="width:100%;" type="text" name="isbn">
						<xsl:attribute name="value">
							<xsl:value-of select="isbn"/>
						</xsl:attribute>
					</input>
				</td>
				<td style="width:5%;">
					<input style="width:100%;" type="text" name="pages">
						<xsl:attribute name="value">
							<xsl:value-of select="pages"/>
						</xsl:attribute>
					</input>
				</td>
				<td style="width:3%;">
					<a target="_blank">
						<xsl:if test="note[@type='dnb']">
							<xsl:attribute name="href">
								<xsl:value-of select="note[@type='dnb']"/>
							</xsl:attribute>lien
						</xsl:if>
						
					</a>
				</td>
				<td style="width:5%;">
					<input type="submit" value="Modifier"/>
				</td>
			</form>
			<form method="POST">
			<input type="hidden" name="pp_AUTHOR" >
				<xsl:attribute name="value">
						<xsl:value-of select="$author"/>
					</xsl:attribute>
				</input>
				
				<input type="hidden" name="pp_TITLE" >
				<xsl:attribute name="value">
						<xsl:value-of select="$title"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pp_YEAR" >
				<xsl:attribute name="value">
						<xsl:value-of select="$year"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pp_SCHOOL" >
					<xsl:attribute name="value">
						<xsl:value-of select="$school"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pp_ORDER_TYPE" >
				<xsl:attribute name="value">
						<xsl:value-of select="$order_type"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pp_ORDER" >
				<xsl:attribute name="value">
						<xsl:value-of select="$order"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pp_SIZE" >
				<xsl:attribute name="value">
						<xsl:value-of select="$end - $begin"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pp_BEGIN" >
				<xsl:attribute name="value">
						<xsl:value-of select="$begin"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="REF" >
					<xsl:attribute name="value">
						<xsl:value-of select="@key"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="MODE"  value="S"/>
			<td style="width:5%;">
				<input type="submit" value="Supprimer"/>
			
			</td>
			</form>
		</tr>
		
		</xsl:if>
	</xsl:template>
	
	
	

</xsl:stylesheet>
