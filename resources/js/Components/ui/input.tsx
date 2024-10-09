import React, { useState } from "react";
import { cn } from "@/lib/utils";
import { EyeIcon, EyeOffIcon } from "lucide-react";

function InputError({ message }: { message: any }) {
    return message ? (
        <p className={"text-sm  text-red-600 "}>{message}</p>
    ) : null;
}

interface MyInputProps extends React.InputHTMLAttributes<HTMLInputElement> {
    label?: string;
    value?: string | number;
    placeholder?: string;
    error?: string;
    disabled?: boolean;
    inputClassName?: string;
}

export const Input: React.FC<MyInputProps> = ({
    label,
    onChange,
    placeholder = "",
    name,
    type = "text",
    inputClassName,
    className = "",
    error,
    value,
    disabled = false,
    ...props
}) => {
    const [inputType, setInputType] = useState(type);

    const handleOnChange: React.ChangeEventHandler<HTMLInputElement> = (e) => {
        if (!onChange) return;

        return onChange(e);
    };

    const togglePasswordVisibility = () => {
        setInputType((prevType) =>
            prevType === "password" ? "text" : "password"
        );
    };

    return (
        <div className={`flex flex-col w-full gap-1  ${className} `}>
            {label && (
                <label className="text-sm font-semibold text-gray-800">
                    {label}
                </label>
            )}
            <div
                className={cn(
                    `flex  h-9 items-center overflow-hidden ${
                        disabled
                            ? "   bg-gray-100"
                            : "text-black bg-transparent  border-[#979797]  border"
                    }  rounded-[5px]  ${inputClassName} `
                )}
            >
                <input
                    name={name}
                    className={`px-2 py-1 w-full h-full text-sm border-0 placeholder:text-sm focus:ring-0 focus:ring-transparent bg-transparent `}
                    placeholder={placeholder}
                    type={inputType}
                    disabled={disabled}
                    onChange={handleOnChange}
                    min={type === "number" ? 0 : undefined}
                    value={value}
                    {...props}
                />
                {type === "password" && (
                    <>
                        {inputType === "password" ? (
                            <button
                                className="pr-2 "
                                onClick={togglePasswordVisibility}
                            >
                                <EyeIcon />
                            </button>
                        ) : (
                            <div
                                className="pr-2 "
                                onClick={togglePasswordVisibility}
                            >
                                <EyeOffIcon />
                            </div>
                        )}
                    </>
                )}
            </div>
            <InputError message={error} />
        </div>
    );
};
