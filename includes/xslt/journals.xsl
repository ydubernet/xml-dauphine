<?xml version="1.0" encoding="UTF-8"?>


<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:param name="begin_journal"/>
	<xsl:param name="journal"/>
	<xsl:param name="begin"/>
	<xsl:param name="end"/>
    <xsl:output method="html"/>


   <xsl:template match="/dblp">
		<h2 style="text-align:center;">Les Journals</h2>
			<ul style="width: 100% ;">
            <xsl:apply-templates select="descendant::journal[contains(.,$journal)][starts-with(.,$begin_journal)][not(preceding::journal/. = .)]">
				<xsl:sort select="." data-type="text" />
			</xsl:apply-templates>
			</ul>
    </xsl:template>
	
	
	<xsl:template match="journal">
		<xsl:if test="position() = ($begin + 1) ">
			<table>
			<tr>
			<xsl:if test="$begin &gt; 0">
				<td>
					<form method="GET">
					<input type="hidden" name="pg_BEGIN" >
						<xsl:attribute name="value">
								<xsl:value-of select="($begin - ($end - $begin))"/>
							</xsl:attribute>
						</input>
						<input type="hidden" name="pg_JOURNAL" >
						<xsl:attribute name="value">
								<xsl:value-of select="$journal"/>
							</xsl:attribute>
						</input>
						
						<input type="hidden" name="pg_BEGIN_JOURNAL" >
						<xsl:attribute name="value">
								<xsl:value-of select="$begin_journal"/>
							</xsl:attribute>
						</input>
						<input type="hidden" name="pg_SIZE" >
						<xsl:attribute name="value">
								<xsl:value-of select="$end - $begin"/>
							</xsl:attribute>
						</input>
						<input type="submit" value="Précédent"/>
					</form>
				</td>
			</xsl:if>
			<xsl:if test="last() &gt; $end">
				<td>
					<form method="GET">
						<input type="hidden" name="pg_JOURNAL" >
						<xsl:attribute name="value">
								<xsl:value-of select="$journal"/>
							</xsl:attribute>
						</input>
						
						<input type="hidden" name="pg_BEGIN_JOURNAL" >
						<xsl:attribute name="value">
								<xsl:value-of select="$begin_journal"/>
							</xsl:attribute>
						</input>
						<input type="hidden" name="pg_SIZE" >
						<xsl:attribute name="value">
								<xsl:value-of select="$end - $begin"/>
							</xsl:attribute>
						</input>
						<input type="hidden" name="pg_BEGIN" >
						<xsl:attribute name="value">
								<xsl:value-of select="$end"/>
							</xsl:attribute>
						</input>
						<input type="submit" value="Suivant"/>
					</form>
				</td>
				
			</xsl:if>
			</tr>
			</table>	
		</xsl:if>
		
	
		<xsl:if test="position()&gt; $begin and position()&lt; ($end+1)">
			<li style="width : 33%;float:left;">
				<a>
					<xsl:attribute name="href">
						<xsl:value-of select="concat('publications.php?journal=',.)"/>
					</xsl:attribute>
					<xsl:value-of select="."/>
				</a>
			</li>			
		</xsl:if>
	</xsl:template>
	

</xsl:stylesheet>
