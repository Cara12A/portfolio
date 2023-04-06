import { Spinner } from '@wordpress/components'
import { sprintf, __ } from '@wordpress/i18n'
import { Icon, chevronRightSmall } from '@wordpress/icons'
import { useRecommendations } from '@assist/hooks/useRecommendations'

export const Recommendations = () => {
    const { recommendations, loading, error } = useRecommendations()

    // Get partner name from globals
    const partnerName = window.extAssistData.partnerName
    // Check if activePartnersName has something in it and if it matches the partner name
    const activePartnerRecs = recommendations?.filter(
        (rec) =>
            rec.activePartnersName !== null &&
            rec.activePartnersName?.includes(partnerName),
    )
    // Remove all excluded partners and remove where activePartnersName is set to something
    const filteredRecs = recommendations?.filter(
        (rec) =>
            !rec.excludedPartnersName?.includes(partnerName) &&
            rec.activePartnersName === null,
    )
    // Now combine the active recommendations if available with the filtered ones, active ones come before all others
    const finalRecs =
        activePartnerRecs?.length > 0
            ? [...activePartnerRecs, ...filteredRecs]
            : filteredRecs

    if (loading || error) {
        return (
            <div className="w-full flex justify-center bg-white border border-gray-300 p-2 lg:p-4 rounded">
                <Spinner />
                {error && (
                    <p className="text-sm text-red-500">{error.message}</p>
                )}
            </div>
        )
    }

    if (recommendations?.length === 0 || finalRecs?.length === 0) {
        return (
            <div className="w-full border border-gray-300 p-2 lg:p-4 bg-white rounded">
                {__(
                    "All set! We don't have any recommendations right now for your site.",
                    'extendify',
                )}
            </div>
        )
    }

    return (
        <div
            id="assist-recommendations-module"
            className="w-full border border-gray-300 text-base bg-white p-4 md:p-8 rounded">
            <div className="flex justify-between items-center gap-2">
                <h2 className="text-lg leading-tight m-0">
                    {__('Recommendations', 'extendify')}
                </h2>
                {recommendations?.length > 2 && (
                    <a
                        href="admin.php?page=extendify-assist#recommendations"
                        className="inline-flex items-center no-underline text-sm text-design-main hover:underline">
                        {sprintf(
                            __('View all (%s)', 'extendify'),
                            recommendations?.length,
                        )}
                        <Icon
                            icon={chevronRightSmall}
                            className="fill-current"
                        />
                    </a>
                )}
            </div>
            <div className="w-full mt-4 text-base flex flex-col gap-4">
                {finalRecs
                    .slice(0, 5)
                    .map(
                        ({
                            slug,
                            title,
                            description,
                            linkType,
                            externalLink,
                            internalLink,
                        }) => (
                            <a
                                key={slug}
                                className="block p-4 bg-gray-100 hover:bg-gray-200 text-gray-900 no-underline"
                                href={
                                    linkType === 'externalLink'
                                        ? `${externalLink}`
                                        : `${window.extAssistData.adminUrl}${internalLink}`
                                }
                                target={
                                    linkType === 'externalLink' ? '_blank' : ''
                                }
                                rel={
                                    linkType === 'externalLink'
                                        ? 'noreferrer'
                                        : undefined
                                }>
                                <h3 className="text-base font-medium m-0 mb-1.5">
                                    {title}
                                </h3>
                                <span className="text-sm">{description}</span>
                            </a>
                        ),
                    )}
            </div>
        </div>
    )
}
